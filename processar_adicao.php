<?php
include 'conexao.php';
$conexao = conectarDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeNovoMorador = $_POST['nomeNovoMorador'];
    $telefoneNovoMorador = $_POST['telefoneNovoMorador'];
    $idadeNovoMorador = $_POST['idadeNovoMorador'];
    $localNovoMorador = $_POST['localNovoMorador'];

    $stmt = $conexao->prepare("INSERT INTO moradias (morador, telefone, idade, local) VALUES (:morador, :telefone, :idade, :local)");
    $stmt->bindParam(':morador', $nomeNovoMorador);
    $stmt->bindParam(':telefone', $telefoneNovoMorador);
    $stmt->bindParam(':idade', $idadeNovoMorador);
    $stmt->bindParam(':local', $localNovoMorador);
    $stmt->execute();

    header("Location: index.php");
}
?>
