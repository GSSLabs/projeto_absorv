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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../Gstyle.css">

</head>
<body>
    <h1>Atualize a unidade</h1><br>
    
    <div class="card">
    	<h1>_Lista de banheiros_</h1><br>
            <?php

            $Sql_lista = "Select * from banheiro";
            $Result_lista = mysqli_query($conn, $Sql_lista);

    echo"<div class='card'>";

        echo"<table class='table'>";
        echo"<thead>";
        echo"<th> local </th>";
        echo"<th> estque </th>";
        echo"</thead>";
        
            while ($row_lista = mysqli_fetch_assoc($Result_lista)) {
                echo"<tr>";
                echo "<td>" . $row_lista['nome'] . "</td>";
                echo "<td>" . $row_lista['estoque'] . "</td>";
                echo"</tr>";
            }

        echo"</table>";
    echo"</div>";
            ?>
    </div>
    <div class="card">
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="Terreo">
                <label>Térreo</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">alterar</button>
            </div>
        </form><br>
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="andar_1">
            	<label>Andar 1</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">alterar</button>
            </div>
        </form><br>
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="andar_2">
            	<label>Andar 2</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">alterar</button>
            </div>
        </form><br>
        
        <form action="admin_alt_confirm.php" method="post">
            <div class="acoes">
                <input type="hidden" name="banheiro" value="andar_3">
            	<label>Andar 3</label><input type="number" id="valor" name="valor"><br>
                <button type="submit">alterar</button>
            </div>
        </form>
    </div><br>
    	<center><a href="./admin_painel.php"><button class="botao">voltar</button></a></center>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    </body>
</html>