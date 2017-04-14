var filtro = new ActionsFiltro();
var urlGaleria = null;
var urlListado = null;
var min = null;
var max = null;
var cuotamin = null;
var cuotamax = null;


function ActionsFiltro()
{



	//Ejecuta el filtro por ajax
	this.filtrar = function(vista)
	{
	    //creo la miga de pan de la busqueda
	    this.migaPan();
            
	    if(vista == 'Galeria')
	    {
	        url = this.urlGaleria;
	        $('#bloques').addClass('checking');
	        $("#listados").removeClass('checking');
	    }


	    if(vista == 'Lista')
	    {
	        url = this.urlListado;
	        $('#bloques').removeClass('checking');
	        $("#listados").addClass('checking');
	    }


	    $.ajax({
	        type: "POST",
	        cache: false,
	        url: url,
	        data: $('#filtro').serialize(),
	        beforeSend: function () {
	            $('#listado').html("<div id='contentLoad'><i class='fa fa-spinner fa-pulse loading-spinner'></i></div> ");
	        },
	        success: function (data) {
	            $('#listado').html( data );
                    
                    var reventas = $('input[name="reventas[]"]').serializeArray(); 
                    
                    if(reventas.length==1){
                        reventas.forEach(function (item) {
                            console.log("https://" + window.location.hostname + "/img/marcas/" + item.value + ".png" );
                            $( "#img_logo_sup" ).attr( "src", "https://" + window.location.hostname + "/img/marcas/" + item.value + "__reventa.png" );
                        })
                    } else {
                        $( "#img_logo_sup" ).attr( "src", "https://" + window.location.hostname + "/img/marcas/logo-todo-listado-2.png" );
                    }
                    console.log(reventas);

                    
	        }
	    });
	}



	//Carga la miga de pan provocada por el filtrado de la funcion anterior
	this.migaPan = function()
	{
	    $('#migapan').html('');

	    $('input[name="marca[]"]:checked').each(function() {
	    
	        $('#migapan').append('<li><a><i class="glyphicon glyphicon-remove"></i>'+$(this).val()+'</a></li>');
	    });

	    $('input[name="categ[]"]:checked').each(function() {
	    
	        $('#migapan').append('<li><a><i class="glyphicon glyphicon-remove"></i>'+$(this).attr('label')+'</a></li>');
	    });

	    $('input[name="plan[]"]:checked').each(function() {
	    
	        $('#migapan').append('<li><a><i class="glyphicon glyphicon-remove"></i>Plan '+$(this).val()+'</a></li>');
	    });
	}


	/*Funcion para seleccionar los checks pero haciendo click en los labels 
	de los mismos*/
	this.chexFiltroLabel = function()
	{

	    $('#filtro li label').on('click', function(){


	        if($(this).prev().is(':checked'))
	        {
	            $(this).prev().prop('checked', false);
	        }
	        else
	        {
	            $(this).prev().prop('checked', true);
	        }


	        vista = $('#posts').attr('vista');
	        filtro.filtrar(vista);

	    });
    }




    this.vistaFiltro = function(vista, url)
    {
    	if(vista == 'Galeria')
    		this.urlGaleria = url;

    	if(vista == 'Lista')
    		this.urlListado = url;

    	this.filtrar(vista);
    }




    this.slidePrecio = function()
    {

    	$( "#defaultSlider1" ).slider({

		    value: min,
		    min: min,
		    max: max,
		    step:2000,
		    slide: function( event, ui ) { 
		    $( "#precioDesde" ).val(ui.value );
		    },

		    stop:  function( event, ui ) { 

		    vista = $('#posts').attr('vista');
		    $( "#defaultSlider3" ).slider({ disabled: false });
		    filtro.filtrar(vista);
		    },

		    start: function( event, ui ) { 
		    $( "#defaultSlider3" ).slider({ disabled: true }); 
		    $( "#precioCuota" ).val(0);
		    $( "#defaultSlider3" ).slider({ value: 0 });
		    }
		});

    }



    this.slideCuota = function()
    {
    	$( "#defaultSlider3" ).slider({
		    value: cuotamin,
		    min: cuotamin,
		    max: cuotamax,
		    step:100,

		    slide: function( event, ui ) { 
		      $( "#precioCuota" ).val(ui.value );
		    },

		    stop:  function( event, ui ) { 

		      vista = $('#posts').attr('vista');
		      $( "#defaultSlider1" ).slider({ disabled: false });
		      filtro.filtrar(vista);
		    },

		    start: function( event, ui ) { 
		      $( "#defaultSlider1" ).slider({ disabled: true }); 
		      $( "#precioDesde" ).val(0);
		      $( "#defaultSlider1" ).slider({ value: 0 });
		    }
		});

    }
}