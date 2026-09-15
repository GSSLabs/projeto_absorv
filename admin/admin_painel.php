<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Gstyle.css">
</head>

<body>

    <aside class="barra-lateral">
        <h2>Administração</h2>
                <a href="./admin_atualizar.php"><button class="botao">atualizar estoque</button></a>
                <a href="../index.html"><button class="botao">painel</button></a>
    </aside>

    <div class="conteudo">
        <h1>Painel de administrador</h1>
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
                    on banheiro.id = movimentacoes.fk_banheiro_id
                    ORDER BY movimentacoes.id DESC
					LIMIT 10";
            $sql_mov_result = mysqli_query($conn, $sql_mov);

            echo "<div class='card'>";
            while ($row_mov = mysqli_fetch_assoc($sql_mov_result)) {             
                
                echo "<table border='1'>";
                echo "<thead>";
        		echo "<tr>";
                    echo "<th>Quantidade</th>";
                    echo "<th>Tipo</th>";
                    echo "<th>Data/Hora</th>";
                    echo "<th>Banheiro</th>";
        		echo "</tr>";
    			echo "</thead>";
    			echo "<tbody>";
        		echo "<tr>";
                    echo "<td>". $row_mov['quantidade'] ."</td>";
                    echo "<td>". $row_mov['tipo'] . "</td>";
                    echo "<td>" . $row_mov['data_hora'] ."</td>";
                    echo "<td>" . $row_mov['nome'] . "</td>";
            	echo "</tr>";
                echo "</tbody><br>";
                echo "</table>";

            }
            	echo "</div>";
            ?>
        </div>
        <br>
    </div>
</body>

</html>