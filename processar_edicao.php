<?php 
    include 'conexao.php';
    $conexao = conectarDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $morador = $_POST['morador'];
        $telefone = $_POST['telefone'];
        $idade = $_POST['idade'];
        $local = $_POST['local'];

        $stmt = $conexao->prepare("UPDATE moradias SET morador = :morador, telefone = :telefone, idade = :idade, local = :local WHERE id = :id");
        $stmt->bindParam(':morador', $morador);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':local', $local);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: index.php");
    }
?>
