<?php
// Configurações do banco de dados
$host = "localhost";
$db = "pizzaria";
$user = "root";
$password = "";

try {
    // Cria a conexão com o banco de dados
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro como exceção
    echo "Conexão com o banco está ok";
} catch (PDOException $e) {
    // Exibe a mensagem de erro em caso de falha na conexão
    echo "Erro ao conectar: " . $e->getMessage();
}
?>

