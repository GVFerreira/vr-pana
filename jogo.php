<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>V-Razor Game</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://aframe.io/releases/1.5.0/aframe.min.js"></script>

        <style>
            #countdown {
                font-size: 12rem;
                text-shadow: 0px 0px 10px #000;
            }
        </style>
    </head>
    <body id="body-jogo" onresize="tamanhoTela()">
        <a-scene>
            <a-assets>
                <img id="skyTexture" src="img/bg-main.webp">
            </a-assets>
            
            <a-entity id="cursor" cursor="fuse: false;"></a-entity>
            <a-entity laser-controls="hand: right" raycaster="objects: .clickable"></a-entity>
            <a-entity laser-controls="hand: left" raycaster="objects: .clickable"></a-entity>
            
            <a-sky src="#skyTexture"></a-sky>
        </a-scene>

        <audio id="backgroundMusic" src="./img/music.mp4"></audio>
        <p id="tempo">0.000</p>
        <div id="countdown"></div>
    </body>
    <script src="./js/game.js"></script>
    <!-- <script>
        $(document).ready(function () {
            //Desabilita a função de cortar, copiar e colar
            $('body').bind('cut copy paste', function (e) {
                e.preventDefault()
            })

            //Desabilita o clique direito do mouse
            $("body").on("contextmenu",function(e){
                return false
            })
        });

        // Desabilitar a funcionalidade de arrastar para avançar ou voltar a página no Chrome
        window.addEventListener('load', function() {
            function disableBackSwipe(event) {
                event.preventDefault()
            }

            window.addEventListener('touchmove', disableBackSwipe, { passive: false })
        })
    </script> -->
</html>
