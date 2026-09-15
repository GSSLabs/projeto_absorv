<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("../conexao.php");

$banheiro = $_POST["local"];
$quant = $_POST["quantidade"];

$sql_id = "SELECT id FROM banheiro WHERE nome = '$banheiro'";
$resultado_id = mysqli_query($conn, $sql_id);

$dados = mysqli_fetch_assoc($resultado_id);

$id_banheiro = $dados['id'];

mysqli_begin_transaction($conn);

try {

    $sql = "INSERT INTO movimentacoes (quantidade,tipo,data_hora,fk_banheiro_id)
            VALUES ('$quant','retira','$data_hora','$id_banheiro')";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception(mysqli_error($conn));
    }

    $sql = "UPDATE banheiro
            SET estoque = estoque - $quant
            WHERE id = '$id_banheiro'
            and estoque >='$quant'";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    header("Location: ./user_painel.php");
    exit();

} catch (Exception $e) {

    mysqli_rollback($conn);

    die("Erro: " . $e->getMessage());
}

?>