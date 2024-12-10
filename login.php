<?php
    //incluir o arquivo de conexão com o banco
    include_once "conexao.php";

    //vamos pegar o conteúdo digitado pelo usuário
    //e armazenar nas variáveis de memória
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        //POST -> USAR VARIÁVEL SUPERGLOBAL $_POST
        //GET -> USAR VARIÁVEL SUPERGLOBAL $_GET
        $email = $_POST['email'];
        $senha = trim($_POST['senha']);
        //$_SESSION= Variável superglobal quer armazena informações para passar de um programa para outro.
        
        session_start();
        try {
            $select = $con->prepare("SELECT senha,id_usuario,nome FROM usuarios WHERE email = :email");
            $select->bindParam(':email', $email);
            $select->execute();
            $result = $select->fetch();
            
            if ($result && password_verify($senha, $result['senha'])) {
            //Salvando o idUsuario para utilizar no cadastro de tarefas
            $_SESSION['idusuario']= $result['id_usuario'];
            $_SESSION['nome']= $result['nome'];
                header('location: pedidos.html');
                exit();
            } else {
                header('location: index.html');
                exit();
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

}
?>
