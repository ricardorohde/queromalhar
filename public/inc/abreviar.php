<?php
function abreviar($texto,$limite,$tres_p = '...'){
	 if(strlen(" ".strip_tags($texto))<=$limite){
		 $tres_p = "";
		 $retornar = $texto;
	 }
	 else{
		 $texto = str_replace("<font ","<font",$texto);
		 $texto = str_replace("<div ","<div",$texto);
		 $vetor = explode(" ",$texto);
		 $total = 0;
		 $retornar = "";
		   for($i=0;$i<sizeof($vetor);$i++){
		   $total += strlen(" ".strip_tags($vetor[$i]));
			   if($total<=$limite){
			   $retornar .= " ".str_replace("<div","<div ",str_replace("<font","<font ",$vetor[$i]));
			   }
			   else{
			   break;
			   }
		   }
 		}
 return trim($retornar).$tres_p;
}
?>