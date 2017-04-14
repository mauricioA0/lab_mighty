$(document).ready(function() {

    var listadoAhorro = $("ul#ultimos").children("li.todo").length;
    $(".comparar-producto input:checkbox[name=comparar]").prop('checked', false);
    $(".numero").text(listadoAhorro);

    $("#marca li").click(function() {

        var categoria = $(this).attr('data-marca');
        var contenido = $(this).html();


        var marcas = $(this).attr('data-marca').toLowerCase();
        $("#marca li").removeClass('item-activo');

        $(this).addClass('item-activo');

        $("#listado li").hide();
        $('.marcaListadoBread').html(contenido);
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-' + marcas + '.png');

        $("#listado li").each(function() {

            if ($(this).hasClass(categoria)) {

                $(this).show();

            }
        });

        var un = $("ul#listado").children("li." + categoria + "").length;
        $(".cantidad").text(un);
    });


    $("#planes li").click(function() {

        var categoria = $(this).attr('data-plan');
        var contenido = $(this).html();
        var tipodeplan = $(this).attr('data-tipo-plan');
        var marcas = $(this).attr('data-plan').toLowerCase();


        $("#planes li").removeClass('item-activo');

        $(this).addClass('item-activo');

        $("#listado li").hide();
        $('.marcaListadoBread').html(contenido);
        $('#logoListadoMarcas img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-' + marcas + '-listado-' + tipodeplan + '.png');
        $("#listado li").each(function() {
            if ($(this).hasClass(categoria)) {
                $(this).show();
            }
        });

        var un = $("ul#listado").children("li." + categoria + "").length;
        $(".cantidad").text(un);



    });



    $("#categorias h3").click(function() {
        var tipodeplan = $(this).attr('data-tipo-plan');
        $("#listado li").addClass('todo').show();
        $('#logoListadoMarcas img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-todo-listado-' + tipodeplan + '.png');
    });
    $("#cate li").click(function() {
        var categoria = $(this).attr('data-modelo');

        var contenido = $(this).html();
        $("#cate li").removeClass('item-activo');

        $(this).addClass('item-activo');

        $("#listado li").hide();
        $('.marcaListadoBread').html(contenido);

        $("#listado li").each(function() {
            if ($(this).hasClass(categoria)) {
                $(this).show();
            }


        });

        var un = $("ul#listado").children("li." + categoria + "").length;
        $(".cantidad").text(un);
    });

    $("#marcas h3").click(function() {
        var tipodeplan = $(this).attr('data-tipo-plan');
        $("#listado li").addClass('todo').show();
        $('#logoListadoMarcas img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-todo-listado-' + tipodeplan + '.png');
    });


    $("#tipodePlan li").click(function() {
        var categoria = $(this).attr('data-plan');

        var contenido = $(this).html();
        $("#tipodePlan li").removeClass('item-activo');

        $(this).addClass('item-activo');

        $("#listado li").hide();
        $('.marcaListadoBread').html(contenido);
        $("#listado li").each(function() {
            if ($(this).hasClass(categoria)) {
                $(this).show();
            }


        });

        var un = $("ul#listado").children("li." + categoria + "").length;
        $(".cantidad").text(un);

    });


    $("#nombreMarca li").click(function() {
        var categoria = $(this).attr('data-plan');
        var contenido = $(this).html();
        $("#nombreMarca li").removeClass('item-activo');

        $(this).addClass('item-activo');

        $("#listado li").hide();
        $('.marcaListadoBread').html(contenido);
        $("#listado li").each(function() {
            if ($(this).hasClass(categoria)) {
                $(this).show();
            }


        });

        var un = $("ul#listado").children("li." + categoria + "").length;
        $(".cantidad").text(un);
    });

    $("#marca li").click(function() {
        var marcas = $(this).attr('data-marca');
        var categoria = $(this).attr('data-marca');
        $("#marca li").removeClass('item-activo');

        $(this).addClass('item-activo');

        $("#listado li").hide();

        $("#listado li").each(function() {
            if ($(this).hasClass(marcas)) {
                $(this).show();
                $("#sinModelo").hide();
            } else {
                $("#sinModelo").css('visibility', 'visible');
                $("#sinModelo").text('No contiene modelos nuevos!');
            }
        });

        var un = $("ul#listado").children("li." + categoria + "").length;
        $(".cantidad").text(un);
    });

    $('#bloque').on('click', function() {
        $('.itemLiModelosMarca').addClass('col-md-12');
        $('.itemLiModelosMarca').css("min-height", "190px");
        $('.itemLiModelosMarca').removeClass('col-md-4');
        $('.img-container').removeClass('col-md-12').addClass('col-md-4');
        $(".hover-item").css({
            "position": "absolute",
            "top": "0px",
            "left": "300px "
        });
        $('.item-content-info').removeClass('col-md-8').addClass('col-md-7').addClass(' margin-r');
        $('.item-price').removeClass('col-md-12').addClass('col-md-7').addClass(' margin-r');
        $('.inner-hover').addClass('over');

    });
    $('#largo').on('click', function() {
        $('.itemLiModelosMarca').removeClass('col-md-12');
        $('.itemLiModelosMarca').addClass('col-md-4');
        $('.img-container').addClass('col-md-12').removeClass('col-md-4');
        $(".hover-item").css({
            "position": "absolute",
            "top": "220px",
            "left": "0px "
        });
        $('.item-content-info').addClass('col-md-12').removeClass('col-md-7').removeClass(' margin-r');
        $('.item-price').addClass('col-md-12').removeClass('col-md-7').removeClass(' margin-r');
        $('.inner-hover').removeClass('over');
    });



    $("#marcas.utilitarios").click(function() {
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-autosencuotas.png');
    });
    $("#categorias.utilitarios").click(function() {
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-autosencuotas.png');
    });
    $("#categorias.planesnuevos").click(function() {
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-autosencuotas.png');
    });
    $("#tipodePlan.planesnuevos").click(function() {
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-autosencuotas.png');
    });
    $("#categorias.economicos").click(function() {
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-autosencuotas.png');
    });
    $("#tipodePlan.economicos").click(function() {
        $('.logoMarcaListado img').attr('src', 'https://www.autosencuotas.com.ar/public/img/marcas/logo-autosencuotas.png');
    });



    var convertToNumber = function(value) {
        return parseFloat(value.replace('$', ''));
    }

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var height = $(window).height();
        var tamanio = $('#listado').height();
        var top = 300;
        var bottom = 1260;
        if (scroll > top) {
            $('.te').html(scroll);
            $('#columnasMarca').addClass('fijo');
            $('#modelosListado').addClass('right');
            if (scroll > tamanio) {
                $('.te').html('mas grande que ' + tamanio);
                $('#columnasMarca').removeClass('fijo');
            }
        } else {
            $('#columnasMarca').removeClass('fijo');
        }


    });

    // arma la URL a comparar
    $('#productos a').click(function(){
       arma = '';
      $(".comparar-producto input:checkbox[name=comparar]:checked").each(function(){
        arma+=($(this).attr('data-compare'))+'u'+$(this).attr('data-compare-tipo')+'-';
      });
        $(this).attr("href","comparador?id="+arma+"");
    });

    // Comparador de planes de ahorro
    $(".comparar-producto fieldset input:checkbox[name=comparar]").on('click', function(){
      var has = $(this).attr('data-comparar');
      var id = $(this).attr('data-compare');
      var idTipo = $(this).attr('data-compare-tipo');

      if($(this).is(':checked')){
        $(this).parents('li').addClass(has);
      }else{
        $(this).parents('li').removeClass(has);
      }

      var seleccionado = $("ul#listado").children("li." + has + "").length;
      var checked = $(this).prop('checked').length;
      $(".prod-a-compa").text(seleccionado);

      if(seleccionado > 3){
        $(this).attr('disabled','disabled').attr('checked', false);
        $(this).parents('li').removeClass(has);
        alert('No se puede comparar más de 3 productos al mismo tiempo.');
        $(".prod-a-compa").text((seleccionado - 1));
      }else{
        $(".comparar-producto input:checkbox[name=comparar]").attr('disabled',false);
      }
    });


    //var p = $( "#modelosListado h1" );
    //var offset = p.offset();
    //p.html( "left: " + offset.left + ", top: " + offset.top );

});
