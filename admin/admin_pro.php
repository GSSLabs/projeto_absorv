<?php
session_start();
require_once("../conexao.php");
$conexao =  mysqli_connect($servidor, $user, $senha, $banco);

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "select * from administrador where nome = '$usuario' and senha = '$senha'";
$sql_result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($sql_result) > 0) {
    header("location: ./admin_painel.php");
    exit();
} else {
    header("location: ./admin_log_erro.html");
    exit;
}