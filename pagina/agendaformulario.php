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
        //select * from agenda where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location: ./agendalista.php");
    }
    ?>
    <h2>Formulário da Agenda</h2>
    <form action="./agendaformulario.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>

        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo !empty($result->titulo) ? $result->titulo : "" ?>" /><br>

        <label>Data de Inicio</label>
        <input type="text" name="data de inicio" value="<?php echo !empty($result->data_inicio) ? $result->data_inicio : "" ?>" /><br>

        <label>Hora que começa</label>
        <input type="text" name="hora que começa" value="<?php echo !empty($result->hora_inicio) ? $result->hora_inicio : "" ?>" /><br>

        <label> Data de Encerramento</label>
        <input type="text" name="Data de Encerramento" value="<?php echo !empty($result->data_fim) ? $result->data_fim : "" ?>" /><br>

        <label>Hora do Encerramento</label>
        <input type="text" name="Hora que encerra" value="<?php echo !empty($result->hora_fim) ? $result->hora_fim : "" ?>" /><br>

        <label> Local</label>
        <input type="text" name="local" value="<?php echo !empty($result->local) ? $result->local : "" ?>" /><br>

        <label>Descrição do Evento</label>
        <input type="text" name="descrição" value="<?php echo !empty($result->descrição) ? $result->descrição: "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./contatoagenda.php">Voltar</a> <br>
</body>

</html>