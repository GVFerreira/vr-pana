<?php
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>V-Razor Game</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    </head>
    <body id="body-gameover">
        <img id="img-panasonic" src="img/logo-desafio.png">
        <div id="container-gameover">
            <div id="restart">
                <h1>Fim de jogo...</h1>
                <p>Seu tempo: <span id="minha-pontuacao" class="spans"></span> segundos</p>
                <p>Quantidade de acertos: <span id="acertos" class="spans"></span> cliques</p>
                <button id="btn-restart" onclick="window.location.href = 'index'" disabled>reiniciar</button>
            </div>
        </div>
    </body>
    <script>
        const pontuacao = window.localStorage.getItem("minha-pontuacao")
        const spanPontuacao = document.getElementById('minha-pontuacao')
        spanPontuacao.innerText = pontuacao

        const acertos = window.localStorage.getItem("acertos")
        const spanAcertos = document.getElementById('acertos')
        spanAcertos.innerText = acertos
        
        function habilitarBotao() {
            var botao = document.getElementById("btn-restart");
            botao.disabled = false;
        }

        // Chama a função após 3 segundos (3000 milissegundos)
        setTimeout(habilitarBotao, 5000);

        setTimeout(() => {
           window.location.href = 'index' 
        }, 15 * 1000)
    </script>
</html>
