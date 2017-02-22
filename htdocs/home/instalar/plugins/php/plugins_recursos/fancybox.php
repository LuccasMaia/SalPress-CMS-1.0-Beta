<?php

// fancybox
function fancybox(){

// pasta de recurso
$pasta_recurso = PASTA_RECURSOS."fancybox/";

// url de scripts
$script[0] = $pasta_recurso."jquery.fancybox.css";
$script[1] = $pasta_recurso."jquery.fancybox.js";

// codigo html
$html .= "<link rel='stylesheet' href='$script[0]' type='text/css' media='screen'/>";
$html .= "<script type='text/javascript' src='$script[1]'></script>";
$html .= "\n";
$html .= "<script type='text/javascript'>";
$html .= "$(document).ready(function(){";
$html .= "$('.fancybox').fancybox();";
$html .= "});";
$html .= "</script>";
$html .= "\n";

// retorno
return $html;

};

?>