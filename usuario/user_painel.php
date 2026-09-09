<?php
session_start();
include_once("../conexao.php")

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
    <div class="acoes">
        <a href=""><button>térreo</button></a>
        <a href=""><button>Andar 1</button></a>
        <a href=""><button>Andar 2</button></a>
        <a href=""><button>Andar 3</button></a>
    </div>
</body>

</html>