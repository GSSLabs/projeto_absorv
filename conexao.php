<?php
$servidor ="localhost";
$user = "root";
$senha = "";
$banco = "banco_absorv";

$conn= mysqli_connect($servidor,$user,$senha,$banco);

date_default_timezone_set('America/Sao_Paulo');
$data_hora = date('y-m-d h:i:s');

if(!$conn){
    die("erro de conexão : ".mysqli_connect_error());
}

?>