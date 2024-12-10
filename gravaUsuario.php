<?php
include_once "conexao.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $nome=$_POST['nome'];
    $senha=$_POST['senha'];
    $complemento=$_POST['complemento'];
    $cep=$_POST['cep'];
    $telefone=$_POST['telefone'];
    $endereco=$_POST['endereco'];
    // criptografar senha
    $hash= password_hash($senha,PASSWORD_DEFAULT);

    $insert=$con->prepare('INSERT INTO usuarios (email, nome, senha, complemento, cep, telefone, endereco) VALUES (:email, :nome, :senha, :complemento, :cep, :telefone,:endereco)');
    $insert->bindParam('email',$email);
    $insert->bindParam('nome',$nome);
    $insert->bindParam('senha',$hash);
    $insert->bindParam('complemento',$complemento);
    $insert->bindParam('cep',$cep);
    $insert->bindParam('telefone',$telefone);
    $insert->bindParam('endereco',$endereco);

    //executar o insert
    if($insert->execute()){
        header('location:login.html');
    }
    else {
        header('location:login.html');
    }
}
?>
