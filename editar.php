<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">

    <title>Edição</title>
</head>

<body class="container p-5">

    <?php
    include 'conexao.php';
    $conexao = conectarDB();

    $id = $_GET['id'];

    $stmt = $conexao->prepare("SELECT * FROM moradias WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $morador = $stmt->fetch();

    ?>

    <h1>Editar morador</h1>

    <form action="processar_edicao.php" method="POST">


        <!-- Nome -->
        <div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label class="form-label text-white" for="nome">Nome do morador:</label>
            <input class="form-control" type="text" name="morador" id="morador" value="<?= $morador['morador'] ?>">
        </div>

        <!-- Telefone -->
        <div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label class="form-label text-white" for="telefone">Telefone:</label>
            <input class="form-control" type="number" name="telefone" id="telefone"value="<?= $morador['telefone'] ?>">
        </div>

        <!-- Idade -->
        <div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label class="form-label text-white" for="idade">Idade:</label>
            <input class="form-control" type="number" name="idade" id="idade" value="<?= $morador['idade'] ?>">
        </div>

        <!-- Local -->
        <div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label class="form-label text-white" for="local">Local:</label>
            <input class="form-control" type="text" name="local" id="local"value="<?= $morador['local'] ?>">
        </div>


        <div class="mt-5">
        <input class="btn btn-success" type="submit" value="Salvar alterações">
        <a class="btn btn-primary" href="index.php">Voltar</a>
        </div>

    </form>

     <!-- Bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>

</html>