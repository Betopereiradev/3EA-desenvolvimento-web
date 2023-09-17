<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Controle de moradores</title>
</head>

<body>

    <div class="container">
        <h1 class="mt-5 mb-5">Lista de moradias</h1>

       <!-- Botão para abrir modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            Adicionar novo morador
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="modalCadastrar" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">Cadastre um novo morador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">


                        <form action="processar_adicao.php" method="POST">
                            <div class="mb-3">
                                <label for="nomeNovoMorador" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nomeNovoMorador" id="nomeNovoMorador">
                                <div id="emailHelp" class="form-text">Insira o nome do novo morador.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="telefoneNovoMorador" class="form-label">Telefone</label>
                                <input type="number" class="form-control" name="telefoneNovoMorador" id="telefoneNovoMorador">
                                <div id="emailHelp" class="form-text">Insira o telefone do novo morador.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="idadeNovoMorador" class="form-label">Idade</label>
                                <input type="number" class="form-control" name="idadeNovoMorador" id="idadeNovoMorador">
                                <div id="emailHelp" class="form-text">Insira a idade do novo morador.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="localNovoMorador" class="form-label">Local</label>
                                <input type="text" class="form-control" name="localNovoMorador" id="localNovoMorador">
                                <div id="emailHelp" class="form-text">Insira o endereço do novo morador.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'conexao.php';
        $conexao = conectarDB();

        $stmt = $conexao->query("SELECT * FROM moradias");
        ?>

        <div class="container-tabela mt-3">
            <table>
                <tr>
                    <th scope="col">Morador</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Local</th>
                    <th scope="col">Ações</th>
                </tr>

                <?php while ($row = $stmt->fetch()): ?>
                    <tr>
                        <td>
                            <?= $row['morador'] ?>
                        </td>
                        <td>
                            <?= $row['telefone'] ?>
                        </td>
                        <td>
                            <?= $row['idade'] ?>
                        </td>
                        <td>
                            <?= $row['local'] ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                            <button class="btn btn-danger" onclick="confirmarExclusao(<?= $row['id'] ?>)">Excluir</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza de que deseja excluir este morador?")) {
                window.location.href = "excluir.php?id=" + id;
            }
        }
    </script>

</body>

</html>