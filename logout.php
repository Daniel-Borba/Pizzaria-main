<?php
// Fechando o banco de dados
unset($con);
// ou $con=null
session_start();
// Destruindo variável de sessão
session_destroy();
header("Location:index.html");
?>
