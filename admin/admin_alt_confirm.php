<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("../conexao.php");

$valor = $_POST["valor"];
$andar = $_POST["banheiro"];

$sql = "update banheiro set estoque = '$valor' where nome = '$andar'";
$sql_result = mysqli_query($conn, $sql);

if ($sql_result) {
    header("location: ./admin_atualizar.php");
    exit();
} else { 
    header("location: ./admin_atualizar.php");
    exit;
}