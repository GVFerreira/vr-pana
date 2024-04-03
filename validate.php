<!--< ?php
    include('connection.php');

    $celular = $_POST['celular'];
    $sql = "SELECT * FROM cadastros_lp WHERE celular = '$celular'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Inicializa um array para armazenar os resultados
        $response = array();

        // Define o status e a mensagem de alerta no array de resposta
        $response['celular'] = $celular;
        $response['status'] = 'error';
        $response['message'] = 'Usuário não encontrado';

        // Retorna o array de resposta como JSON
        header('Content-Type: application/json');
        echo json_encode($response);

    } else {
        setcookie("celular", $celular, time() + 86400, "/");

        // Redireciona o usuário para a tela do jogo
        header("Location: /index?start=true");
        exit;

    }
?> -->

<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados enviados pelo webhook
    $dados = $_POST;
    $celular = $dados['celular'];
    $sql = "SELECT * FROM cadastros_lp WHERE celular = '$celular'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Se o cadastro existe, defina o cookie
        setcookie("celular", $celular, time() + 86400, "/");

        // Retorna uma resposta de sucesso com uma mensagem indicando ao navegador do tablet que ele deve redirecionar o navegador do totem
        http_response_code(200);
        echo json_encode(array("redirect" => "/vrpana/index?start=true"));
    } else {
        // Se o cadastro não existe, retorna uma resposta de erro
        http_response_code(404);
        echo "Cadastro não encontrado.";
    }
} else {
    // Se a requisição não for do tipo POST, responde com um erro
    http_response_code(405);
    echo "Método não permitido.";
}
?>
