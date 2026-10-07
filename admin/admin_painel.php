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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>
    <link rel="stylesheet" href="../Gstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <aside class="barra-lateral">
        <h2>Administração</h2>
                <a href="../index.html"><button class="botao">painel</button></a>
                <a href="./admin_atualizar.php"><button class="botao">atualizar estoque</button></a>
    </aside>

    <div class="conteudo">
        <h1>Painel de administrador</h1>
        <hr>
    <div class='lista'>
            <h1>_Lista de banheiros_</h1><br>
<!-- _____________CARDS DO ESTOQUE DE BANHEIROS____________________________ --> 
        <?php

            $Sql_lista = "Select * from banheiro";
            $Result_lista = mysqli_query($conn, $Sql_lista);


                echo"<div class='card'>";
                ///inicio da estrutura de tabela ...
                echo"<table class='table'>";

                    echo"<tbody>"; 
                        echo"<th> LOCAL </th>";
                        echo"<th> ESTOQUE </th>";
                    echo"</tbody>";
                ///ÁREA DE PUXADA DE DADOS ...
                while($row_mov = mysqli_fetch_assoc($Result_lista)){

                    echo "<tr>";
                    echo "<td>" . $row_mov['nome'] . "</td>";
                    echo "<td>". $row_mov['estoque'] . "</td>";
                    echo"</tr>";
                }
                ///FIM DA ÁREA DE PUXADA DE DADOS....
                    echo"</table>";  
                /// FIM DA ESTRUTURA DE TABELAS...
                echo"</div>";
        ?>
    </div>
<!-- _____________________FIM CARDS DO ESTOQUE DE BANHEIROS______________ --> 
    <br>

<!--ultima alteração--->
<div class="lista">
                <h1>_Uso Total por Andar_</h1>
            
                <?php

$Sql_mov = "SELECT
                banheiro.nome,
                SUM(movimentacoes.quantidade) AS total
            FROM movimentacoes
            INNER JOIN banheiro
            ON banheiro.id = movimentacoes.fk_banheiro_id
            where tipo = 'retira'
            GROUP BY banheiro.nome
            ORDER BY banheiro.nome";

$Result_lista = mysqli_query($conn, $Sql_mov);

            echo "<div class='card'>";
                echo "<table id='tabelausototal'class='table'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>LOCAL</th>";
                            echo "<th>TOTAL UTILIZADO POR ANDAR</th>";
                        echo "</tr>";
                    echo "</thead>";
              
                while ($row_mov = mysqli_fetch_assoc($Result_lista)) {

                    echo "<tr>";
                        echo "<td>" . $row_mov['nome'] . "</td>";
                        echo "<td>" . $row_mov['total'] . "</td>";
                    echo "</tr>";
                }

            
                echo "</table>";
            echo "</div>";

            ?>

            </div><br>
<!-- Ultima Atualização --->

    <div class="lista">
            <h1>_Historico de Uso_</h1>
            <?php
            $sql_mov = "select * from movimentacoes
                    inner join banheiro
                    on banheiro.id = movimentacoes.fk_banheiro_id
                    ORDER BY movimentacoes.id DESC
					LIMIT 10";
            $sql_mov_result = mysqli_query($conn, $sql_mov);

        echo "<div class='card'>";
                  
                
        echo "<table id='tabelaProdutos' class='table'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th> Quantidade </th>";
                    echo "<th> Tipo </th>";
                    echo "<th> Data/Hora </th>";
                    echo "<th> Banheiro </th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
             while ($row_mov = mysqli_fetch_assoc($sql_mov_result)) { 
                echo "<tr>";
                echo "<td>". $row_mov['quantidade'] ."</td>";
                echo "<td>". $row_mov['tipo'] . "</td>";
                echo "<td>" . $row_mov['data_hora'] ."</td>";
                echo "<td>" . $row_mov['nome'] . "</td>";
                echo "</tr>";
         }
            echo "</tbody>";
                echo "</table>";         
            	echo "</div>";
            ?><br>
            <button id="btnDownload" class="botao">Baixar PDF</button>
    </div><br>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="../js/js_salvarPdf.js"></script>
</body>

</html>