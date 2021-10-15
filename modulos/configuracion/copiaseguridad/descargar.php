<?php
include ("../../seguridad/comprobar_login.php");
$empresa=$_SESSION["empresa"];
$f = $_POST["f"];
$nombreR="Respaldo-".date("Y-m-d-H-i-s").".sql";
$ruta= "../../../empresas/$empresa/copiasseguridad/$f";
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$nombreR\"\n");
    $fp=fopen("$ruta", "r");
    fpassthru($fp);
?>