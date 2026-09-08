<?php
session_start();
require_once("./conexao.php");

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "select * from administrador where usuario = '$usuario' and senha = '$senha'";
$sql_result = mysqli_query($conn,$sql);


?>