var actions = new Actions();




function Actions()
{


	/*Ejecuta la logica y envio de las consultas de los modal */
	this.modalConsulta = function(id)
	{
	    var boton = $('#mostrarModeloModal-' + id);
            
	    var nombreModelo = $(boton).attr('data-nombre');
	    var cuotasDesde = $(boton).attr('data-cuota');
	    var imagen = $(boton).attr('data-img');
	    var idModelo = $(boton).attr('data-id');
	    var idConce = $(boton).attr('data-conce');
	    var tipoPlan = $(boton).attr('data-tipo');
	    var idPublicacion = $(boton).attr('data-publicacion');
	    var nombrePlan = $(boton).attr('data-nom-public');
	    var tipo_publicacion = $(boton).attr('data-public');

	    $("h2.asesoresTitulo").css('font-size', '12px !important');
	    $(".modal-header span.nom").text(nombreModelo);
	    $(".modal-header span.tipoPlan").text('Plan ' + tipoPlan + ' 84 cuotas');
            
            if(tipo_publicacion == "adjudicado"){
                $(".modal-header span.cuota").text('Valor de cuota total aprox: $' + cuotasDesde);
            } else { 
                $(".modal-header span.cuota").text('Cuotas desde: $' + cuotasDesde);
            }
	    $(".modal-header span.img").html('<img src="' + imagen + '" class="img-responsive">');
	    $("#modelo").val(idModelo);
	    $(".modalBox").css('display', 'block');
            $("#conce_id").val(idConce);
	    //$('#Consultas_publicacion_id').val(idPublicacion);
	    $('#Consultas_publicacion_id').val(idModelo);
	    $('#Consultas_tipo_plan_cons').val(tipoPlan);
	    $('#Consultas_cant_cuotas_coons').val();
	    $('#Consultas_nombre_plan_con').val(nombrePlan);


	    
	    $(".cerrarFlotante").click(function() {
	        $(".modalBox").css('display', 'none');
	    });
	}



	this.overMenuPlanahorro = function()
	{
		/*$("#planDeAhorro").hover(function(){
			$(this).find("section#subMenuWhite").slideDown(400, function(){

				if(!$(this).is(':visible'))
				{
					$('.ulModelosListadoGral').hide();
				}
			});
		}, function(){
			$(this).find("section#subMenuWhite").slideUp();
		});*/

                $j('#planDeAhorro').hoverIntent({    
		    sensitivity: 1, // number = sensitivity threshold (must be 1 or higher)    
		    interval: 100,  // number = milliseconds for onMouseOver polling interval    
		    timeout: 100,   // number = milliseconds delay before onMouseOut    
		    over:function(){
		        $(this).find("section#subMenuWhite").slideToggle(400, function(){

				if(!$(this).is(':visible'))
				{
					$('.ulModelosListadoGral').hide();
				}
                                
                                $('#planDeAhorroURL').attr("style","background: white;color: black;");
			});
		    },
                    out:function(){
			$(this).find("section#subMenuWhite").slideUp();
                        $('#planDeAhorroURL').removeAttr("style","background: white;color: black;");
                    }
		} );
                
		$('.ulModelosListadoGral').hide();

		$j('#nombreMarcas li').hoverIntent({    
		    sensitivity: 1, // number = sensitivity threshold (must be 1 or higher)    
		    interval: 100,  // number = milliseconds for onMouseOver polling interval    
		    timeout: 500,   // number = milliseconds delay before onMouseOut    
		    over:function(){
		        
		        var marca = $(this).attr('data-list');
			    $(this).addClass('hoverList');

			    $(".ulModelosListadoGral").each(function() {
		            if ($(this).hasClass(marca)) {
		                $(this).show();
		            }else{
		            	$(this).hide();
		            }
		 		});
		    }
		});
	}


        this.aceptacionCookie = function(){

	 	$.ajax({
                    url: '/ajax-aceptacion-cookie',
                    type: 'POST',
                    dataType: 'json',
                    data: { },
                    cache: false,
                    success: function(data) {
                        
                        $("#aceptar-cookie").replaceWith('');

                    }
                })
        }
        
	this.votacionRaty = function(score, modelo)
	{

	 	$.ajax({
            url: '/ajax-votacion-raty',
            type: 'POST',
            dataType: 'json',
            data: { voto: score, modelo: modelo },
            cache: false,
            success: function(data) {
                
                if(data.estado)
                {
                	$('#promedio').html(data.raty);
            		$('#raty-modelos-raty').html('<br>¡Gracias por tu calificación!');
                }
                else
                {
                	$('#promedio').html(data.raty);
            		$('#raty-modelos-raty').html('<br>¡Ya votaste este modelo!');
                }
            	
            }
        })
	}
        
        this.getMarcas = function(id_con)
	{
            $.ajax({
                url: '/ajax-marca',
                type: 'POST',
                dataType: 'json',
                data: { idDiv: id_con},
                cache: false,
                success: function(data) {

                    $('#' + id_con).replaceWith('<div class="nueva-seleccion" id="' + id_con + '">' + data + '</div>');

                }
            })
	}
        
        this.comparadorMarca = function(marca,id_con)
	{
            $.ajax({
                url: '/ajax-marca-comparador',
                type: 'POST',
                dataType: 'json',
                data: { marca: marca, idDiv: id_con},
                cache: false,
                success: function(data) {

                    $('#' + id_con).replaceWith('<div class="nueva-seleccion comparaLLena" id="' + id_con + '">' + data + '</div>');

                }
            })
	}
        
        
        this.comparadorPlanes = function(modelo,id_con)
	{
            $.ajax({
                url: '/ajax-planes-comparador',
                type: 'POST',
                dataType: 'json',
                data: { modelo: modelo, idDiv: id_con},
                cache: false,
                success: function(data) {

                    $('#' + id_con).replaceWith('<div class="nueva-seleccion comparaLLena" id="' + id_con + '">' + data + '</div>');

                }
            })
	}
        
        
        this.selectorPlan = function(publicacion,id_con)
	{
            $.ajax({
                url: '/ajax-selector-plan',
                type: 'POST',
                dataType: 'json',
                data: { publicacion: publicacion, idDiv : id_con },
                cache: false,
                success: function(data) {

                    $('#' + id_con).replaceWith('<div class="nueva-seleccion comparaLLena" id="' + id_con + '">' + data + '</div>');

                }
            })
	}
        
        
        this.camparadorSelector = function(publicacion)
	{
           
            var valor_act = $('#prod-a-compa').text();
            var valor_url = $('#url_comparar').attr('href');
            
            
            if(parseInt(valor_act) == 3 && $('#' + publicacion ).attr('checked') ){
                $('#' + publicacion).removeAttr('checked');
                alert("Solo puede seleccionar 3 publicaciones para comparar");
                return false;
            }
            // verifica si lo esta sumando o restando
            if ($('#' + publicacion ).attr('checked')) {
                $('#prod-a-compa').text( parseInt(valor_act) + 1 );
                $('#nro_compara').text(  "(" + (parseInt(valor_act) + 1) + ")");
                // asignar url al comparador
                $('#url_compara').attr('style','background-color : green; color: #fff');
                $('#text_compara').text('Ver comparacion');
                $('#url_compara').attr('href',valor_url + '/' + publicacion);
                
                // movil
                $('#url_compara_mov').attr('style','background-color : green;');
                $('#text_compara_mov').text('Ver comparacion');
                $('#url_compara_mov').attr('href',valor_url + '/' + publicacion);
                
                
                $('#url_comparar').attr('href',valor_url + '/' + publicacion);
            } else {
                $('#prod-a-compa').text( parseInt(valor_act) - 1 );
                
                if((parseInt(valor_act) - 1) == 0){
                    $('#text_compara').text('Comparar Planes');
                    $('#url_compara').removeAttr('style');
                    $('#nro_compara').text( "" );
                    
                    // movil
                    $('#text_compara_mov').text('Comparar Planes');
                    $('#url_compara_mov').removeAttr('style');
                    $('#nro_compara_mov').text( "" );
                    
                } else {
                    $('#nro_compara').text( "(" + (parseInt(valor_act) - 1) + ")" );
                    $('#nro_compara_mov').text( "(" + (parseInt(valor_act) - 1) + ")" );
                }
                // se le saca la asignacion que se le ha des chequeado
                var new_url = valor_url.replace('/' + publicacion,'');
                $('#url_comparar').attr('href',new_url);
                $('#url_compara').attr('href',new_url);
            }
            
	}
        
        this.agregarFavorito = function ( tipo, publicacion ){
           $.ajax({
                url: '/ajax-favoritos',
                type: 'POST',
                dataType: 'json',
                data: { publicacion: publicacion, tipo : tipo },
                cache: false,
                success: function(data) {
                    console.log(data);
                }
            })
        }
        
        
        this.agregarURLcomparador = function ( url ){
            
            var valor_url = $('#url-comparador').attr('value');
            
            valor_url = valor_url + url;
            
            var valor_soc = encodeURIComponent(valor_url);
         
            $('#url-comparador').attr('value',valor_url);
            
            $('#url_face').attr('href','https://www.facebook.com/sharer/sharer.php?u=' + valor_soc);
            
            $('#url_google').attr('href','https://plus.google.com/share?url=' + valor_soc);
            
            $('#url_twitter').attr('href','http://twitter.com/home?status=' + valor_soc);
           
            
        }
        
        this.quitarURLcomparador = function ( url ){
            
            var valor_url = $('#url-comparador').attr('value');
            
            valor_url = valor_url.replace(url, "")
            
            var valor_soc = encodeURIComponent(valor_url);
         
            $('#url-comparador').attr('value',valor_url);
            
            $('#url_face').attr('href','https://www.facebook.com/sharer/sharer.php?u=' + valor_soc);
            
            $('#url_google').attr('href','https://plus.google.com/share?url=' + valor_soc);
            
            $('#url_twitter').attr('href','http://twitter.com/home?status=' + valor_soc);
            
        }
        
        this.copiarTexto = function ( url ){
            document.execCommand("copy", true, url);
            console.log(url);
        }
        
        this.comparaRelacionado = function ( id ){
            // verificar si se esta utilizando los campos de comparacion previos
            var c1 = $( "#comparadorEspacio1" ).hasClass( "comparaLLena" );
            
            if(c1){

                var c2 = $( "#comparadorEspacio2" ).hasClass( "comparaLLena");
                
                if(c2){
                    
                    var c3 = $( "#comparadorEspacio3" ).hasClass( "comparaLLena");
                    
                    if(c3){
                        alert("Solo se puede seleccionar 3 modelos para comparar");
                    } else {
                        actions.selectorPlan(id,'comparadorEspacio3');
                    }
                } else {
                    actions.selectorPlan(id,'comparadorEspacio2');
                }
            } else {
                actions.selectorPlan(id,'comparadorEspacio1');
            }
        }
}
