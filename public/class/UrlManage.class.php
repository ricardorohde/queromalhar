<?php
class UrlManage {
	public static function getUrl($registro,$categoria,$titulo){
		if(UrlManage::HabilitadoModRewrite()){
			return UrlManage::convertStringByUrlString($categoria)."/$registro/".UrlManage::convertStringByUrlString($titulo);
		} else {
			return "noticia.php?id=$registro";
		}
	}

	private static function convertStringByUrlString($String){
		$Separador = "-";
		$String = trim($String); //Removendo espa�os do inicio e do fim da string
		$String = strtolower($String); //Convertendo a string para min�sculas
		$String = strip_tags($String); //Retirando as tags HTML e PHP da string
		$String = eregi_replace("[[:space:]]", $Separador, $String); //Substituindo todos os espa�os por $Separador
		$String = eregi_replace("[��]", "c", $String); //Substituindo caracteres especiais pela letra respectiva
		$String = eregi_replace("[����������]", "a", $String);
		$String = eregi_replace("[��������]", "e", $String);
		$String = eregi_replace("[��������]", "i", $String);
		$String = eregi_replace("[����������]", "o", $String);
		$String = eregi_replace("[��������]", "u", $String);
		$String = eregi_replace("(\()|(\))", $Separador, $String); //Substituindo outros caracteres por "$Separador"
		$String = eregi_replace("(\/)|(\\\)", $Separador, $String);
		$String = eregi_replace("(\[)|(\])", $Separador, $String);
		$String = eregi_replace("[@#\$%&\*\+=\|�]", $Separador, $String);
		$String = eregi_replace("[;:'\"<>,\.?!_-]", $Separador, $String);
		$String = eregi_replace("[��]", $Separador, $String);
		$String = eregi_replace("(�)+", $Separador, $String);
		$String = eregi_replace("[`�~^�]", $Separador, $String);
		$String = eregi_replace("($Separador)+", $Separador, $String); //Removendo o excesso de "$Separador" por apenas um
		$String = substr($String, 0, 100); //Quebrando a string para um tamanho pr�-definido
		$String = eregi_replace("(^($Separador)+)|(($Separador)+$)", "", $String); //Removendo o "$Separador" do inicio e fim da string
		return $String;
	}		
	
	private static function HabilitadoModRewrite(){
		return true;
	}
}
?>