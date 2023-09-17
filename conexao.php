<?php
    function conectarDB() {
        $host = 'localhost';
        $dbname = 'controle_moradias';
        $usuario = 'alberto';
        $senha = '8456klop';

        try {
            $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
            return $conexao;
        } catch(PDOException $e) {
            echo "Erro a conectar " . $e->getMessage();
        }
    }

?>