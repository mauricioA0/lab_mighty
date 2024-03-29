<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | https://github.com/hybridauth/hybridauth
*  (c) 2009-2011 HybridAuth authors | hybridauth.sourceforge.net/licenses.html
*/

/**
 * Hybrid_Endpoint class
 * 
 * Hybrid_Endpoint class provides a simple way to handle the OpenID and OAuth endpoint.
 */
class Hybrid_Endpoint {
	public static $request = NULL;
	public static $initDone = FALSE;

	/**
	* Process the current request
	*
	* $request - The current request parameters. Leave as NULL to default to use $_REQUEST.
	*/
	public static function process( $request = NULL )
	{
		// Setup request variable
		Hybrid_Endpoint::$request = $request;

		if ( is_null(Hybrid_Endpoint::$request) ){
			// Fix a strange behavior when some provider call back ha endpoint
			// with /index.php?hauth.done={provider}?{args}... 
			// >here we need to recreate the $_REQUEST
			if ( strrpos( $_SERVER["QUERY_STRING"], '?' ) ) {
				$_SERVER["QUERY_STRING"] = str_replace( "?", "&", $_SERVER["QUERY_STRING"] );

				parse_str( $_SERVER["QUERY_STRING"], $_REQUEST );
			}

			Hybrid_Endpoint::$request = $_REQUEST;
		}

		// If windows_live_channel requested, we return our windows_live WRAP_CHANNEL_URL
		if ( isset( Hybrid_Endpoint::$request["get"] ) && Hybrid_Endpoint::$request["get"] == "windows_live_channel" ) {
			Hybrid_Endpoint::processWindowsLiveChannel();
		}

		// If openid_policy requested, we return our policy document
		if ( isset( Hybrid_Endpoint::$request["get"] ) && Hybrid_Endpoint::$request["get"] == "openid_policy" ) {
			Hybrid_Endpoint::processOpenidPolicy();
		}

		// If openid_xrds requested, we return our XRDS document
		if ( isset( Hybrid_Endpoint::$request["get"] ) && Hybrid_Endpoint::$request["get"] == "openid_xrds" ) {
			Hybrid_Endpoint::processOpenidXRDS();
		}

		// If we get a hauth.start
		if ( isset( Hybrid_Endpoint::$request["hauth_start"] ) && Hybrid_Endpoint::$request["hauth_start"] ) {
			Hybrid_Endpoint::processAuthStart();
		}
		// Else if hauth.done
		elseif ( isset( Hybrid_Endpoint::$request["hauth_done"] ) && Hybrid_Endpoint::$request["hauth_done"] ) {
			Hybrid_Endpoint::processAuthDone();
		}
		// Else we advertise our XRDS document, something supposed to be done from the Realm URL page
		else {
			Hybrid_Endpoint::processOpenidRealm();
		}
	}

	/**
	* Process Windows Live channel request
	*/
	public static function processWindowsLiveChannel()
	{
		$output = file_get_contents( dirname(__FILE__) . "/resources/windows_live_channel.html" ); 
		print $output;
		die();
	}

	/**
	* Process OpenID policy request
	*/
	public static function processOpenidPolicy()
	{
		$output = file_get_contents( dirname(__FILE__) . "/resources/openid_policy.html" ); 
		print $output;
		die();
	}

	/**
	* Process OpenID XRDS request
	*/
	public static function processOpenidXRDS()
	{
		header("Content-Type: application/xrds+xml");

		$output = str_replace
		(
			"{RETURN_TO_URL}",
			str_replace(
				array("<", ">", "\"", "'", "&"), array("&lt;", "&gt;", "&quot;", "&apos;", "&amp;"), 
				Hybrid_Auth::getCurrentUrl( false )
			),
			file_get_contents( dirname(__FILE__) . "/resources/openid_xrds.xml" )
		);
		print $output;
		die();
	}

	/**
	* Process OpenID realm request
	*/
	public static function processOpenidRealm()
	{
		$output = str_replace
		(
			"{X_XRDS_LOCATION}",
			htmlentities( Hybrid_Auth::getCurrentUrl( false ), ENT_QUOTES, 'UTF-8' ) . "?get=openid_xrds&v=" . Hybrid_Auth::$version,
			file_get_contents( dirname(__FILE__) . "/resources/openid_realm.html" )
		); 
		print $output;
		die();
	}

	/**
	* define:endpoint step 3.
	*/
	public static function processAuthStart()
	{
		Hybrid_Endpoint::authInit();

		$provider_id = trim( strip_tags( Hybrid_Endpoint::$request["hauth_start"] ) );

		# check if page accessed directly
		if( ! Hybrid_Auth::storage()->get( "hauth_session.$provider_id.hauth_endpoint" ) ) {
			Hybrid_Logger::error( "Endpoint: hauth_endpoint parameter is not defined on hauth_start, halt login process!" );

			header( "HTTP/1.0 404 Not Found" );
			die( "You cannot access this page directly." );
		}

		# define:hybrid.endpoint.php step 2.
		$hauth = Hybrid_Auth::setup( $provider_id );

		# if REQUESTed hauth_idprovider is wrong, session not created, etc. 
		if( ! $hauth ) {
			Hybrid_Logger::error( "Endpoint: Invalide parameter on hauth_start!" );

			header( "HTTP/1.0 404 Not Found" );
			die( "Invalide parameter! Please return to the login page and try again." );
		}

		try {
			Hybrid_Logger::info( "Endpoint: call adapter [{$provider_id}] loginBegin()" );

			$hauth->adapter->loginBegin();
		}
		catch ( Exception $e ) {
			Hybrid_Logger::error( "Exception:" . $e->getMessage(), $e );
			Hybrid_Error::setError( $e->getMessage(), $e->getCode(), $e->getTraceAsString(), $e );

			$hauth->returnToCallbackUrl();
		}

		die();
	}

	/**
	* define:endpoint step 3.1 and 3.2
	*/
	public static function processAuthDone()
	{
		Hybrid_Endpoint::authInit();

		$provider_id = trim( strip_tags( Hybrid_Endpoint::$request["hauth_done"] ) );

		$hauth = Hybrid_Auth::setup( $provider_id );

		if( ! $hauth ) {
			Hybrid_Logger::error( "Endpoint: Invalide parameter on hauth_done!" ); 

			$hauth->adapter->setUserUnconnected();

			header("HTTP/1.0 404 Not Found"); 
			die( "Invalide parameter! Please return to the login page and try again." );
		}

		try {
			Hybrid_Logger::info( "Endpoint: call adapter [{$provider_id}] loginFinish() " );

			$hauth->adapter->loginFinish(); 
		}
		catch( Exception $e ){
			Hybrid_Logger::error( "Exception:" . $e->getMessage(), $e );
			Hybrid_Error::setError( $e->getMessage(), $e->getCode(), $e->getTraceAsString(), $e );

			$hauth->adapter->setUserUnconnected(); 
		}

		Hybrid_Logger::info( "Endpoint: job done. retrun to callback url." );

		$hauth->returnToCallbackUrl();
		die();
	}

	public static function authInit()
	{
		if ( ! Hybrid_Endpoint::$initDone) {
			Hybrid_Endpoint::$initDone = TRUE;

			// Start a new session 
			if ( ! session_id() ){
				session_start();
			}

			# Init Hybrid_Auth
			try {
				// Check if Hybrid_Auth session already exist
				if ( ! isset( $_SESSION["HA::CONFIG"] ) ) { 
					header( "HTTP/1.0 404 Not Found" );
					die( "You cannot access this page directly." );
				}

				Hybrid_Auth::initialize( unserialize( $_SESSION["HA::CONFIG"] ) ); 
			}
			catch ( Exception $e ){
                                echo '<pre>';
                                //var_dump($e);
                                //var_dump($_SESSION['user']->user);
                                echo '</pre>';
				Hybrid_Logger::error( "Endpoint: Error while trying to init Hybrid_Auth" ); 
				header( "HTTP/1.0 404 Not Found" );
				die( "Oophs. Error!" );
			}
		}
	}
}
