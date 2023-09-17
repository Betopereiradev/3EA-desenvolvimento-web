<?php 
    include 'conexao.php';
    $conexao = conectarDB();

    $id = $_GET['id'];

    $stmt = $conexao->prepare("DELETE FROM moradias WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php");
?>