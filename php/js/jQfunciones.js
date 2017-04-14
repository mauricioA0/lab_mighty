
$(document).ready(function() {


    $('.openAndLoad').hide();

    $('[data-toggle="tooltip"]').tooltip();
    var closeAll = $('.closeAll');
    closeAll.click(function() {
        $('.openAndLoad').slideUp();
    });

    /*$('.load').click(function() {
        var info = $(this).next('.openAndLoad'); // Find corresponding info
        $('.openAndLoad').not(info).slideUp('slow');
        $("#listado li").addClass('todo').show();
        $(".marcaListadoBread").text('Todos los Planes');
        info.slideToggle('slow');
    });*/

    $('.change').click(function() {
        $('.openAndLoad').slideUp();
    })

    new WOW().init();
    $('.mobil').click(function() {
        $('.menuMobil').toggleClass('open');
    });
    $('.slidebtn').click(function() {
        $('.menuMobil').removeClass('open');
        $('.mostrarMenu').slideUp();
    });
    $('.mostrarMenu').hide();
    $('.showMenu').click(function() {
        $('.mostrarMenu').slideToggle();
    });

    $('.grid-item-content').hover(function() {
        $(this).parent('a').parent('li').addClass('border');
    }, function() {
        $(this).parent('a').parent('li').removeClass('border');
    });
    /*$("#planDeAhorro ").mouseover(function() {
        $("#dropDonwPlanesAhorro").slideDown().css("visibility", "visible");
    });
    $("#planDeAhorro").mouseout(function() {
        $("#dropDonwPlanesAhorro").css("visibility", "hidden");
    });*/



    $("#footer").unstick();

    $('#toTop').on('click', function(event) {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('a.none-state').hide();
    $('.img-state').hover(function() {
        $(this).find('.none-state').fadeIn();
    }, function() {
        $(this).find('.none-state').fadeOut();
    });
    $('.comparador').hide();
    $('#comparador').click(function() {

        $('.comparador').slideToggle();
    });
    $('.fa-exchange').click(function() {
        $('.comparador').slideToggle();
    });
    $('input.buscar-modelos').focus(function() {
        $(this).val(' ');
    });
    $('input.buscar-modelos').blur(function() {
        if ($(this).val() == ' ') {
            $(this).val('Buscar por Nombre o Marca');
        } else {
            $(this).val();
        }

    });


    $("#todos a:contains('Todos')").parent().addClass('activado');
    $("#autos a:contains('Autos')").parent().addClass('activado');
    $("#suv a:contains('Familiar')").parent().addClass('activado');
    $("#utilitarios a:contains('Utilitarios')").parent().addClass('activado');
    $("#camionetas a:contains('Camionetas')").parent().addClass('activado');
    $("#pickups a:contains('Pick-Ups')").parent().addClass('activado');


    $('.bxslider').bxSlider({
        mode: "horizontal",
        speed: 500,
        slideMargin: 0,
        infiniteLoop: true,
        hideControlOnEnd: false,
        captions: false,
        ticker: false,
        tickerHover: false,
        adaptiveHeight: false,
        responsive: true,
        pager: false,
        controls: true,
        autoControls: false,
        minSlides: 1,
        maxSlides: 7,
        moveSlides: 1,
        slideWidth: 160,
        auto: true,
        pause: 4000,
        useCSS: false
    });

    $("#banner-comadj").owlCarousel({
        center: false,
        loop: true,
        dots: true,
        dotsSpeed: 1000,
        merge: true,
        margin: 0,
        navText: ['&#139;', '&#155;'],
        slideBy: 1,
        autoplay: true,
        autoWidth: false,
        autoplayTimeout: 7800,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        startPosition: 0,
        navSpeed: 1000,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            768: {
                items: 1,
                margin: 0,
                nav: false,
            },
            1000: {
                items: 1,
                nav: false,
                loop: true,
                dotsEach: true,
                autoplay: true,
                pagination: true
            }
        }
    });

    $("#slide-home").owlCarousel({
        center: false,
        nav: false,
        loop: true,
        dots: true,
        dotsSpeed: 1000,
        merge: true,
        margin: 0,
        navText: ['&#139;', '&#155;'],
        slideBy: 1,
        autoplay: true,
        autoWidth: false,
        autoplayTimeout: 7800,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        startPosition: 0,
        navSpeed: 1000,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            768: {
                items: 1,
                margin: 0,
                nav: false,
            },
            1000: {
                items: 1,
                nav: false,
                loop: true,
                dotsEach: true,
                autoplay: true,
                pagination: true
            }
        }
    });

    $('#carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        items: 1,
        loop: true,
        nav: true,
        navigation: true,
        controls: true,
        pagination: true,
        dotsEach: true
    });

    /* Planes Destacados Index */
    $("#owl-carousel").owlCarousel({
        items: 4,
        loop: true,
        center: false,
        lazyLoad: true,
        autoplay: true,
        nav: true,
        autoWidth: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            340: {
                items: 3,
                margin: 5,
                nav: true,
            },
            600: {
                items: 3,
                margin: 5,
                nav: true,
            },
            768: {
                items: 2,
                margin: 5,
                nav: true,
            },
            1024: {
                items: 3,
                margin: 5,
                nav: true,
            }
        }

    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 5,
        margin: 10,
        responsiveClass: true,
        navText: ['&#139;', '&#155;'],
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            340: {
                items: 4,
                margin: 5,
                nav: true,
            },
            600: {
                items: 5,
                nav: true
            },
            768: {
                items: 6,
                nav: true,
                loop: true
            },
            1000: {
                items: 5,
                nav: true,
                loop: true
            }
        }
    });

    $("#relacionados").owlCarousel({
        autoPlay: false,
        slideSpeed: 500,
        autoplayHoverPause: true,
        lazyLoad: true,
        slideBy: 1,
        loop: true,
        margin: 0,
        nav: true,
        rtl: false,
        navigation: true,
        controls: true,
        pagination: true,
        paginationNumbers: false,
        mouseDrag: true,
        touchDrag: true,
        autoWidth: false,
        responsive: true,
        items: 3,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            600: {
                items: 2,
                margin: 0,
                nav: true,
            },
            768: {
                items: 2,
                margin: 0,
                nav: true,
            },
            1024: {
                items: 2,
                margin: 0,
                nav: true,
            }
        }
    });

    //$('[data-toggle="tooltip"]').tooltip();

    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 180) {
            $("#ul-nav").addClass('static');
            $("#menuBlue").addClass('active');
            $("li.home-index").html('<a href="https://' + window.location.hostname + '" ><img src="https://www.autosencuotas.com.ar/img/logo-autosencuotas.png" class="loguito" alt="Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan sin interés. Planes de Autos financiados en Pesos" title="Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan sin interés. Planes de Autos financiados en Pesos"></a>');
            $("ul#ul-primary-nav li.home-index a").addClass('nopadding');
        } else {
            $("#ul-nav").removeClass('static');
            $("#menuBlue").removeClass('active');
            $("li.home-index").html('<a href="http://' + window.location.hostname + '" alt="Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan sin interés. Planes de Autos financiados en Pesos" title="Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan sin interés. Planes de Autos financiados en Pesos"><i class="fa fa-home"></i></a>');
            $("ul#ul-primary-nav li.home-index a").removeClass('nopadding');
        }

    });


    $(window).on("scroll", function() {
        
        if ($(window).scrollTop() > 580) {
            $("#slideDownModelo").slideDown();
        } else {
            $("#slideDownModelo").hide();
        };
    });

    /*$(window).on("scroll", function() {
        if ($(window).scrollTop() == 0) {
            $("#hiddenNav").addClass('activoStatic');
            $("#productos").addClass('comparacion_flotante');
        } else {
            $("#hiddenNav").removeClass('activoStatic');
            $("#productos").removeClass('comparacion_flotante');
        }
    });*/


    $("#models-container").unstick();

    $('#toTop').on('click', function(event) {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $(".content-tab").hide();
    $(".content-tab:first").show();
    $(".ul-class li").click(function() {
        $(".ul-class li").removeClass('active-link');
        $(this).addClass('active-link');

        $(".content-tab").hide();
        var content_active = $(this).find('p').attr('data-link');
        $(content_active).show();
    });

    $(".tab-ficha").hide();
    $(".tab-ficha:first").show();
    $(".ul-class-ficha li").click(function() {
        $(".ul-class-ficha li").removeClass('active-link');
        $(this).addClass('active-link');

        $(".tab-ficha").hide();
        var content_active = $(this).find('p').attr('data-link');
        $(content_active).show();
    });

    $("#btnSend").click(function() {
        $(".ul-class li").removeClass('active-link');
        var texto = $('#textarea').val();
        $(".consulta").addClass('active-link');

        $(".content-tab").hide();
        $("#consulta").find('p').attr('data-link');
        $("#consulta").show();

        $("#Consultas_consulta_cons").text(texto);
    });

    $("#btnSend2").click(function() {
        $(".ul-class li").removeClass('active-link');
        var texto = $('#textarea2').val();
        $(".consulta").addClass('active-link');

        $(".content-tab").hide();
        $("#consulta").find('p').attr('data-link');
        $("#consulta").show();

        $("#Consultas_consulta_cons").text(texto);
    });




    //formulario revendedores
    $("#btnSender").click(function() {
        $("#contenedorForm").css('display', 'block');
        var mensaje = $("#textarea").val();
        $("#mensajearea").text(mensaje);
        return false;
    });

    $(".closeForm").click(function() {
        $("#contenedorForm").css('display', 'none');
        $("#formAd input[type=text]").val('');
        $("#formAd input[type=hidden]").val('');
    });

    $('div[data-type="parallax_div"]').each(function() {
        var $bgobj = $(this);
        $(window).scroll(function() {
            $window = $(window);
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            var coords = '50%' + yPos + 'px';

            $bgobj.css({
                backgroundPosition: coords
            });
        });

    });

    $(".slide-down-brand").on("click", function() {
        $("#slide-down").slideToggle();
    });

    // buscador
    $("#buscador").submit(function(e) {
        e.preventDefault();
    });

    $("#buscarDatos").keyup(function() {
        var envio = $("#buscarDatos").val();
        $("#resultadoDeBusqueda").hide();

        if (envio.length > 3) {

            $.ajax({
                url: '/include/busca.php',
                type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: ('buscar=' + envio),
                cache: false,
                success: function(res) {
                    if (res != '' && res != 'Buscar por: Nombre, Marca...') {
                        $("#resultadoDeBusqueda").html('<i class="fa fa-spinner fa-pulse"></i>');
                        $("#resultadoDeBusqueda").css('visibility', 'visible');
                        $("#resultadoDeBusqueda").html(res).show();
                    }

                }
            })

        }
        return false;


    });


    // Favoritos
    $(".favoritoCheck").click(function() {
        var data = $('#fav').serialize();
        var url = "../include/fav.php";

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {

                $("#favor").removeClass('favoritoCheck').addClass('favoritoChecked');
                $(".favoritoChecked span").html('Tiene ' + data + ' modelos agregados.');
                $(".favBarra").html(data);
            }

        });
    });




    // Me gusta
    $("#megusta").click(function() {
        var data = $("#enviomegusta").serialize();
        var url = "../include/mg.php";

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',

            success: function(data) {
                $(".vp").html(data);

                $("#megusta").removeClass('fa-thumbs-up');
                $("#megusta").addClass('fa-heart circulovp');
                $("#enviomegusta").removeAttr("id", "#enviomegusta").attr("id", "clicked");

            }
        });

    });

    // No me Gusta
    $("#noMegusta").click(function() {
        var data = $("#envionomegusta").serialize();
        var url = "../include/nmg.php";

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',

            success: function(data) {
                $(".ng").html(data);
                $("#noMegusta").removeClass('fa-thumbs-down');
                $("#noMegusta").addClass('fa-check circulo');
                $("#envionomegusta").removeAttr("id", "#envionomegusta").attr("id", "clicked");

            }
        });

    });






    //por mail

    $("#mensajemail").keyup(function() {
        var word = $(this).val();
        $(".previaText").html(word);
        return false;
    });

    $("#enviarPorMailBtn").click(function() {
        var data = $('#formMail').serialize();
        var url = "enviarMailCompartir";

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                $('.respondeMail').html(data);
                $("#porMail form ").get(0).reset();
                $("#compartir").attr("style","display: none;");

            }

        });

        return false;

    });




    // compartir
    $('#compartir').hide();
    $('.compartir-slide-down').click(function() {
        $('#compartir').slideDown();
    });
    $('#cerrar').click(function() {
        $('#compartir').slideUp();
    });

    //
    /*$("#planDeAhorro").mouseover(function() {
        $("#dropDonwPlanesAhorro").fadeIn().css("visibility", "visible");
    });
    $("#planDeAhorro").mouseout(function() {
        $("#dropDonwPlanesAhorro").css("visibility", "hidden");
    });*/

});

$(document).ready(function() {

    var app_id = '1680878075483211';
    var scopes = 'email, user_friends, user_online_presence';

    var btn_login = '<a href="" id="loginfb" class="btn btn-success">INICIAR SESSION CON FACEBOOK <i class="fa fa-facebook"></i></a>';
    var div_session = "<div id='facebook-session'" +
        "<strong></strong>" +
        "<img>" +
        "<a href='#' id=' logout ' class='btn btn-danger'>Cerrar Session</a>" +
        "</div>";

    window.fbAsyncInit = function() {
        FB.init({
            appId: app_id,
            status: true,
            cookie: true,
            xfbml: true,
            version: 'v2.2'
        });

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response, function() {

            });
        });

    };

    var statusChangeCallback = function(response, callback) {
        console.log(response);

        if (response.status === 'connected') {
            getFacebookData();
        } else {
            callback(false);
        }
    }

    var checkLoginState = function(callback) {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response, function(data) {
                callback(data);
            });
        });
    }

    var getFacebookData = function() {
        FB.api('/me', function(response) {
            $('#loginfb').after(div_session);
            $('#loginfb').remove();
            $('#facebook-session strong').text("Bienvenido: " + response.name);
            $('#facebook-session img').attr('src', 'http://graph.facebook.com/' + response.id + '/picture?type=small');
        })
    };
    var facebookLogin = function() {
        checkLoginState(function(response) {
            if (!response) {
                FB.login(function(response) {
                    if (response.status === 'connected')
                        getFacebookData();
                }, {
                    scope: scopes
                });
            }
        });
    }
    $(document).on('click', '#login', function(e) {
        e.preventDefault();
        facebookLogin();
    });
})