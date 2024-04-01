<?php
    include('connection.php');

    // Inicializa um array para armazenar os resultados
    $response = array();

    // Obtém o número de telefone informado pelo usuário
    $celular = isset($_POST["celular"]) ? $_POST["celular"] : null;
    // $DDI = $_POST["DDI"];
    setcookie("celular", $celular, time() + 86400, "/");
    // setcookie("DDI", $DDI, time() + 86400, "/");

    // Executar consulta SELECT para verificar se o telefone já existe
    // AND DDI = '$DDI'
    $sql = "SELECT * FROM cadastros_lp WHERE celular = '$celular'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Define o status e a mensagem de alerta no array de resposta
        $response['celular'] = $celular;
        $response['status'] = 'error';
        $response['message'] = 'Usuário não encontrado';

    } else {
        // Define o status e o redirecionamento no array de resposta
        $response['status'] = 'success';
        $response['message'] = 'Usuário identificado';
        $response['user'] = $result;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();

    // Retorna o array de resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
?>
