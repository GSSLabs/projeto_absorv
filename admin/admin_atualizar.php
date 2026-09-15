<?php
	session_start();
	include_once("../conexao.php");
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
    <h1>Atualize a unidade</h1><br>
    
    <div class="card">
    	<h1>_Lista de banheiros_</h1><br>
            <?php

            $Sql_lista = "Select * from banheiro";
            $Result_lista = mysqli_query($conn, $Sql_lista);

            while ($row_lista = mysqli_fetch_assoc($Result_lista)) {
                echo "nome : " . $row_lista['nome'] . " -- ";
                echo "estoque : " . $row_lista['estoque'] . "<br>";
            }

            ?>
    </div>
    <div class="card">
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="banheiro_Térreo">
                <label>Térreo</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">ok</button>
            </div>
        </form><br>
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="banheiro_andar_1">
            	<label>Andar 1</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">ok</button>
            </div>
        </form><br>
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="banheiro_andar_2">
            	<label>Andar 2</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">ok</button>
            </div>
        </form><br>
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="banheiro_andar_3">
            	<label>Andar 3</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">ok</button>
            </div>
        </form>
    </div><br>
    	<center><a href="./admin_painel.php"><button class="botao">voltar</button></a></center>
</body>
</html>