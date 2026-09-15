<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("../conexao.php");

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "select * from administrador where nome = '$usuario' and senha = '$senha'";
$sql_result = mysqli_query($conn, $sql);

if (mysqli_num_rows($sql_result) > 0) {
    header("location: ./admin_painel.php");
    exit();
} else {
    header("location: ./admin_log_erro.html");
    exit;
}