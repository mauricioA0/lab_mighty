<?php
$strJavascriptData = file_get_contents(__DIR__."/../assets/dd5990a0/jquery.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/../assets/dd5990a0/jui/js/jquery-ui.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/jquery.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/owl.carousel.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/bootstrap.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/jquery.hoverIntent.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/wow.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/main.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/jquery.sticky.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/jquery.fancybox.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/jQfunciones.min.js")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/Actions.min.js")."\n";
$strJavascriptData .= " var \$j = jQuery.noConflict(true); \$j.noConflict(); ";
$strJavascriptData .= " function check_image_load(){\$('[data-image]').each(function(e){if (is_in_view($(this))){\$(this).append('<img src=\"'+$(this).attr('data-image')+'\" width=\"'+$(this).attr('data-imagew')+'\" height=\"'+$(this).attr('data-imageh')+'\" />').removeAttr('data-image').hide().fadeIn(2000);
}});
$('[data-real-src]').each(function(e){if (is_in_view($(this))){if($(this).attr('data-real-type')==\"image\"){\$(this).attr('src',\$(this).attr('data-real-src')).removeAttr('data-real-src').hide().fadeIn(2000);
}}});
}function is_in_view(elem){var docViewTop = $(window).scrollTop();
var docViewBottom = docViewTop + $(window).height();
var elemTop = $(elem).offset().top;
var elemBottom = elemTop + $(elem).height();
return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
}$(document).ready(function (){\$(window).load(function(){check_image_load();
actions.overMenuPlanahorro();
window.\$zopim||(function(d,s){var z=\$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2lFQcF7QeweRC4Zje0a2VyYcuROfTSgl';z.t=+new
Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
/*
var vsid = \"sa48522\";
(function(){var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat-'+vsid+'.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
})();
*/
});
$(window).scroll(function(){check_image_load(); });

    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.src = 'http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js'; 
    document.body.appendChild(s);
        
}); ";
header("Content-type: text/javascript");
echo($strJavascriptData);

?>

