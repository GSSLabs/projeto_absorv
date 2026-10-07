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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../Gstyle.css">
</head>

<body>
    <h1>Selecione o andar</h1>
    <hr>
    <div class="lista">
        <?php

        $Sql_lista = "Select * from banheiro";
        $Result_lista = mysqli_query($conn, $Sql_lista);

            echo"<table class='table'>";
            echo"<th> local </th>";
            echo"<th> estoque </th>";

        while ($row_lista = mysqli_fetch_assoc($Result_lista)) {
            echo"<tr>";
            echo "<td>" . $row_lista['nome'] . "</td>";
            echo "<td>" . $row_lista['estoque'] . "</td>";
            echo"</tr>";
        }
            echo"</table>";

        ?>
    </div><br>
    <div class="card">
        <form action="./user_pro.php" method="post">
            <label>escolha o local :</label>
            <div class="acoes">
                <select id="local" name="local">
                    <option value="Terreo">Térreo</option>
                    <option value="andar_1">Andar 1</option>
                    <option value="andar_2">Andar 2</option>
                    <option value="andar_3">Andar 3</option>
                </select>
            </div>
            <label>quantidade retirada :</label>
            <div class="acoes">
                <input type="number" min="1" id="quantidade" name="quantidade"><br><br><button type="submit">OK</button>
            </div>
        </form>
    </div><br>
    <center><a href="../index.html"><button class="botao">voltar</button></a></center>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    
</body>

</html>