<?php 
//eliminate every char except 0-9
$numero="(452)1272288";
$numero = preg_replace("/[^0-9]/", '', $numero);

//eliminate leading 1 if its there
if (strlen($numero) == 11){
	$numero = preg_replace("/^1/", '',$numero);
}
if (strlen($numero) == 10){
	echo "El numero $numero es válido";
}else{
	echo "El numero $numero es inválido";
}
?>