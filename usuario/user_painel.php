<?php
session_start();
include_once("../conexao.php");

error_reporting(E_ALL);
ini_set('display_errors',1);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Gstyle.css">
</head>

<body>
    <h1>Selecione o andar</h1>
    <hr>
    <div class="lista">
        <?php

        $Sql_lista = "Select * from banheiro";
        $Result_lista = mysqli_query($conn, $Sql_lista);

        while ($row_lista = mysqli_fetch_assoc($Result_lista)) {
            echo "" . $row_lista['nome'] . " -- ";
            echo "estoque : " . $row_lista['estoque'] . "<br>";
        }

        ?>
    </div><br>
    <div class="card">
        <form action="./user_pro.php" method="post">
            <label>escolha o local :</label>
            <div class="acoes">
                <select id="local" name="local">
                    <option value="banheiro_Terreo">Térreo</option>
                    <option value="banheiro_andar_1">Andar 1</option>
                    <option value="banheiro_andar_2">Andar 2</option>
                    <option value="banheiro_andar_3">Andar 3</option>
                </select>
            </div>
            <label>quantidade retirada :</label>
            <div class="acoes">
                <input type="number" min="1" id="quantidade" name="quantidade"><br><br><button type="submit">OK</button>
            </div>
        </form>
    </div><br>
    <center><a href="../index.html"><button class="botao">voltar</button></a></center>
</body>

</html>