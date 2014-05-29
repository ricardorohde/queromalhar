<?php
// Data Formato Português
setlocale(LC_ALL,"portuguese");

// Caminho dos Links e Imagens
$url = substr_count($_SERVER["SCRIPT_NAME"],"/");

if($url == 4){
	$pathImg = "../../";
	$pathUrl = "../";
} else {
	$pathImg = "../";
	$pathUrl = "";
}
?>
