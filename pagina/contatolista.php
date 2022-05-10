<?php
include "../database/bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h2>Lista Contatos</h2>
    <form action="./contatolista.php" method="post">

    <input type="search" class="form-control" id="search" style="width:50%; display: inline-block;">
    <button type="submit" name="search_submit" style="float: right; margin-bottom: 50px; margin-right: 870px">Pesquisar</button>

    <button onclickhref="./contatoformulario.php">Cadastrar</button> 
    <br>
    <?php
    $objBD = new BD();
    $objBD->conn();

    if (!empty($_POST['nome'])) {
        $result = $objBD->pesquisar($_POST);
    } else {
        $result = $objBD->select();
    }

    if (!empty($_GET['id'])) {
        $objBD->remover($_GET['id']);
        header("location: contatolista.php");
    }

    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Telefone01</th>
                    <th>tipo_telefone01</th>
                    <th>Telefone02</th>
                    <th>tipo_telefone02</th>
                    <th>email</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id'] . "</td>
            <td>" . $item['nome'] . "</td>
            <td>" . $item['sobrenome'] . "</td>
            <td>" . $item['telefone01'] . "</td>
            <td>" . $item['tipo_telefone01'] . "</td>
            <td>" . $item['telefone02'] . "</td>
            <td>" . $item['tipo_telefone02'] . "</td>
            <td>" . $item['email'] . "</td>
            <td><a href='./contatoformulario.php?id=" . $item['id'] . "'>Editar</a></td>
            <td><a href='./contatolista.php?id=" . $item['id'] . "'
                   onclick=\"return confirm('Deseja remover o registro?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <a href="../index.php">Voltar</a>
</body>

</html>