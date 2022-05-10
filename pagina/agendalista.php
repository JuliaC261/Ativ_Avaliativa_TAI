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
</head>

<body>
    <h2>Lista Agenda</h2>
    <form action="./agendalista.php" method="post">
        <input type="search" name="titulo" placeholder="Pesquisar titulo">
        <input type="search" name="diaquecomeca" placeholder="Pesquisar Dia começo">
        <input type="search" name="horadecomeco" placeholder="Pesquisar Hora começo">
        <input type="search" name="diaquetermina" placeholder="Pesquisar Dia que termina">
        <input type="search" name="horaquetermina" placeholder="Pesquisar Hora que termina">
        <input type="search" name="local" placeholder="Pesquisar local">
        <input type="search" name="descrição" placeholder="Pesquisar descrição">
        <input type="submit" value="Pesquisar">
    </form>
    <a href="./contatoformulario.php">Cadastrar</a> <br>
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
                    <th>Titulo</th>
                    <th>Dia de Inicio</th>
                    <th>Hora de Inicio</th>
                    <th>Dia que Termina</th>
                    <th>Hora que termina</th>
                    <th>local</th>
                    <th>descrição</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id'] . "</td>
            <td>" . $item['titulo'] . "</td>
            <td>" . $item['dia_inicio'] . "</td>
            <td>" . $item['hora_inicio'] . "</td>
            <td>" . $item['dia_fim'] . "</td>
            <td>" . $item['hora_fim'] . "</td>
            <td>" . $item['local'] . "</td>
            <td>" . $item['descriçao'] . "</td>
            <td><a href='./contatoformulario.php?id=" . $item['id'] . "'>Editar</a></td>
            <td><a href='./contatolista.php?id=" . $item['id'] . "'
                   onclick=\"return confirm('Deseja remover o registro?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>

    <a href="../index.php">Voltar</a>
</body>

</html>