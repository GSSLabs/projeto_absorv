<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Painél de administrador</h1>
    <hr>
    <div class='lista'>
        <h1>_Lista de banheiros_</h1><br>
        <?php

        $Sql_lista = "Select * from banheiro";
        $Result_lista = mysqli_query($conn, $Sql_lista);

        while ($row_lista = mysqli_fetch_assoc($Result_lista)) {
            echo "nome : " . $row_lista['nome'] . " -- ";
            echo "estoque : " . $row_lista['estoque'] . "<br>";
        }

        ?>
    </div><br>

    <div class="lista">
        <h1>_movimentações_</h1>
        <?php
        $sql_mov = "select * from movimentacoes
                    inner join banheiro
                    on banheiro.id = movimentacoes.fk_banheiro_id";
        $sql_mov_result = mysqli_query($conn, $sql_mov);

        while ($row_mov = mysqli_fetch_assoc($sql_mov_result)) {
            echo "".$row_mov['nome']." // ";
            echo "tipo :".$row_mov['tipo']."  --  ";
            echo "quantidade : ".$row_mov['quantidade']."  --  ";
            echo "data :".$row_mov['dt']."  --  ";
            echo "hora :".$row_mov['hora']."<br><hr>";
        }
        ?>
    </div>
</body>

</html>