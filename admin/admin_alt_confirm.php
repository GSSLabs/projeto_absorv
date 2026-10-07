<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("../conexao.php");

$valor = $_POST["valor"];
$andar = $_POST["banheiro"];

$sql_id = "SELECT id FROM banheiro WHERE nome = '$andar'";
$resultado_id = mysqli_query($conn, $sql_id);

$dados = mysqli_fetch_assoc($resultado_id);

$id_banheiro = $dados['id'];

mysqli_begin_transaction($conn);

try {

    $sql = "INSERT INTO movimentacoes (quantidade,tipo,data_hora,fk_banheiro_id)
            VALUES ('$valor','atualização','$data_hora','$id_banheiro')";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception(mysqli_error($conn));
    }

    $sql = "update banheiro set estoque = '$valor' where nome = '$andar'";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    header("location: ./admin_atualizar.php");
    exit();

} catch (Exception $e) {

    mysqli_rollback($conn);

    die("Erro: " . $e->getMessage());
}