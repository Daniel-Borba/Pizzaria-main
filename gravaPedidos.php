<?php
include_once "conexao.php"; // Inclui o arquivo de conexão com o banco

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados enviados pelo formulário
    $pizzaFlavor = $_POST['pizza-flavor'];
    $pizzaQuantity = $_POST['pizza-quantity'];
    $beverage = $_POST['beverage'];

    try {
        // Prepara a query para inserir os dados no banco
        $insert = $con->prepare('INSERT INTO pedidos (pizza_flavor, pizza_quantity, beverage) 
                                 VALUES (:pizza_flavor, :pizza_quantity, :beverage)');
        $insert->bindParam(':pizza_flavor', $pizzaFlavor);
        $insert->bindParam(':pizza_quantity', $pizzaQuantity);
        $insert->bindParam(':beverage', $beverage);

        // Executa a query
        if ($insert->execute()) {
            header('Location: sucesso.html'); // Redireciona para uma página de sucesso
        } else {
            header('Location: erro.html'); // Redireciona para uma página de erro
        }
    } catch (PDOException $e) {
        echo "Erro ao gravar pedido: " . $e->getMessage();
    }
}
?>
