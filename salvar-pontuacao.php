<?php
    session_start();
    include("connection.php");

    // Obtenha o celular do jogador dos cookies
    $celular = $_COOKIE['celular'];
    $DDI = $_COOKIE['DDI'];

    // Obtenha a pontuação atual do jogador
    $pontuacaoAtual = $_GET['pontuacaoAtual'];
    echo 'Valor passado pelo AJAX: ' . $pontuacaoAtual;

    // Verifique se o jogador já possui uma pontuação registrada
    $sqlVerificarPontuacao = "SELECT pontuacao FROM cadastros_lp WHERE celular = '$celular' AND DDI = '$DDI'";
    $result = $conn->query($sqlVerificarPontuacao);
    $row = $result->fetch_assoc();

    if ($row) {
        // O jogador já possui uma pontuação registrada, verifique se a pontuação atual é maior
        $pontuacaoRegistrada = $row['pontuacao'];

        if ($pontuacaoAtual < $pontuacaoRegistrada) {
            // Atualize a pontuação do jogador na tabela cadastros_lp
            $sqlAtualizarPontuacao = "UPDATE cadastros_lp SET pontuacao = $pontuacaoAtual WHERE celular = '$celular' AND DDI = '$DDI'";
            $conn->query($sqlAtualizarPontuacao);
        };
    };
?>
