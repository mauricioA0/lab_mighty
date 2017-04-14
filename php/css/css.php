<?php
$strJavascriptData .= file_get_contents(__DIR__."/estilos-index.min.css")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/listado.min.css")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/owl.carousel.css")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/hover.css")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/animation.css")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/jquery.fancybox.css")."\n";
$strJavascriptData .= file_get_contents(__DIR__."/moon.css")."\n";

header("Content-type: text/css; charset: UTF-8");
echo($strJavascriptData);

?>