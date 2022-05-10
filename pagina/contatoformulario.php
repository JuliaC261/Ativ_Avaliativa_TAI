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
    <?php
    $objBD = new BD();
    $objBD->conn();

    if (!empty($_GET['id'])) {
        $result = $objBD->buscar($_GET['id']);
        //select * from contatos where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location: ./contatolista.php");
    }
    ?>
    <h2>Formulário Clientes</h2>
    <form action="./contatoformulario.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>

        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" /><br>

        <label>Sobrenome</label>
        <input type="text" name="sobrenome" value="<?php echo !empty($result->sobrenome) ? $result->sobrenome : "" ?>" /><br>

        <label>Telefone 01</label>
        <input type="text" name="telefone01" value="<?php echo !empty($result->telefone01) ? $result->telefone01 : "" ?>" /><br>

        <label> Tipo de Telefone 01</label>
        <input type="text" name="tipo_telefone01" value="<?php echo !empty($result->tipo_telefone01) ? $result->tipo_telefone01 : "" ?>" /><br>

        <label>Telefone 02</label>
        <input type="text" name="telefone02" value="<?php echo !empty($result->telefone02) ? $result->telefone02 : "" ?>" /><br>

        <label> Tipo de Telefone 02</label>
        <input type="text" name="tipo_telefone02" value="<?php echo !empty($result->tipo_telefone02) ? $result->tipo_telefone02 : "" ?>" /><br>

        <label>email</label>
        <input type="email" name="email" value="<?php echo !empty($result->email) ? $result->email: "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./contatolista.php">Voltar</a> <br>
</body>

</html>