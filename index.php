<?php
    setcookie("celular", "", time() - 3600, "/");
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Desafio Panasonic V-Razor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <script src="https://aframe.io/releases/1.5.0/aframe.min.js"></script>
        <script src="https://unpkg.com/aframe-environment-component@1.1.0/dist/aframe-environment-component.min.js"></script>
    </head>
    <body id="main-content">
        <a-scene>
            <a-sky src="#skyTexture"></a-sky>
            <a-assets>
                <img id="skyTexture" src="img/bg-main.webp">
                <img id="logotipo" src="img/logo-desafio.png">
            </a-assets>

            <a-entity id="home" visible="true" postion="0 0 0">
                <a-plane id="logoPlane" src="#logotipo" position="0 2 -5" opacity="0.99" width="5.8" height="3.3"></a-plane>

                <a-entity geometry="primitive: plane; width: 2; height: 0.5; depth: 0.1" material="color: #FFF" position="0 -1 -5" cursor-listener onclick="goToValidation()">
                    <a-text value="JOGAR" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>

            <a-entity id="validation" position="1000 0 0">
                <a-text value="Valide seu cadastro" align="center" position="0 4.5 -5" scale="2 2 2" color="#FFF"></a-text>
                <a-text value="Digite apenas numeros" align="center" position="0 4 -5" color="#FFF"></a-text>

                <!-- Texto digitado -->
                <a-entity geometry="primitive: plane; width: 4; height: 0.5; depth: 0.1" material="color: #FFF" position="0 3.5 -5">
                    <a-text id="typedText" position="0 0 0"  color="#000" align="center"></a-text>
                </a-entity>

                <!-- Number Pad -->
                <a-entity id="keyboard" position="0 -0.5 -5">
                    <!-- Linha 1 -->
                    <a-entity class="row" position="0 3 0" material="color: transparent">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="1" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="2" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="3" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                    <!-- Linha 2 -->
                    <a-entity class="row" position="0 2 0" material="color: transparent">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="4" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="5" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="6" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                    <!-- Linha 3 -->
                    <a-entity class="row" position="0 1 0" material="color: transparent">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="7" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="8" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="9" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                    <!-- Linha 4 -->
                    <a-entity class="row" position="0 0 0" material="color: transparent">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="LIMPAR" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="0" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5; depth: 0.1" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="APAGAR" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                </a-entity>

                <a-entity geometry="primitive: plane; width: 2; height: 0.5; depth: 0.1" material="color: #FFF" position="0 -1.5 -5" cursor-listener onclick="goToRules()">
                    <a-text value="VALIDAR" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>

            <a-entity id="rules" position="2000 0 0">
                <a-entity geometry="primitive: plane; width: 2; height: 0.5; depth: 0.1" material="color: #FFF" position="0 -1 -5" onclick="goToGame()">
                    <a-text value="VAMOS LA!" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>

            <a-entity id="game" position="3000 0 0">
                <a-entity id="cursor" cursor="fuse: false;"></a-entity>
                <a-entity laser-controls="hand: right" raycaster="objects: .clickable"></a-entity>
                <a-entity laser-controls="hand: left" raycaster="objects: .clickable"></a-entity>
                <a-entity geometry="primitive: plane; width: 2; height: 0.5; depth: 0.1" material="color: #FFF" position="0 5 -5">
                    <a-text id="tempo" value="0.000" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
                <a-entity id="countdown" position="0 1.6 -4"></a-entity>
            </a-entity>
            
            <a-entity id="cursor" cursor="fuse: false; rayOrigin: mouse;"></a-entity>
            <a-entity laser-controls="hand: right"></a-entity>
        </a-scene>

        <audio id="backgroundMusic" src="./img/music.mp4"></audio>

        <script>
            const home = document.getElementById('home')
            const validation = document.getElementById('validation')
            const rules = document.getElementById('rules')
            const game = document.getElementById('game')

            function goToValidation() {
                home.setAttribute('position', '-1000 0 0')
                validation.setAttribute('position', '0 0 0')
            }

            function goToRules() {
                const typedText = document.getElementById('typedText')
                const valueTypedText = typedText.getAttribute('value')

                if (valueTypedText) {
                    fetch("envio-form.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            celular: valueTypedText,
                        })
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status !== 'success') {
                                typedText.setAttribute('value', '')
                                alert('Usuário não cadastrado. Revise o número informado')

                            } else {
                                validation.setAttribute('position', '-2000 0 0')
                                rules.setAttribute('position', '0 0 0')
                            }
                        })
                        .catch(error => console.error('Erro ao carregar a página:', error));
                } else {
                    typedText.setAttribute('value', '')
                    alert('Digite um número de celular.')
                }
            }

            function goToGame() {
                rules.setAttribute('position', '-3000 0 0')
                game.setAttribute('position', '0 0 0')

                // Chama a função para iniciar a contagem regressiva
                startCountdown()
            }
        </script>

        <!-- Number Pad - Validation -->
        <script>
            function handleKeyClick(key) {
                const numberKey = key
                const child = key.querySelector("a-text")
                const value = child.getAttribute('value')

                const typedText = document.getElementById('typedText')
                let valueTypedText = typedText.getAttribute('value')

                if (value === "LIMPAR") {
                    typedText.setAttribute('value', "")
                } else if (value === "APAGAR") {
                    if (valueTypedText.length > 0) {
                        valueTypedText = valueTypedText.slice(0, -1)
                        typedText.setAttribute('value', `${valueTypedText}`)
                    }
                } else {
                    typedText.setAttribute('value', `${valueTypedText ? valueTypedText : ""}${value}`)
                }

            }
        </script>

        <!-- Regras do game -->
        <script>
            function startCountdown() {
                var countdownElement = document.getElementById("countdown")
                var count = 3 // Inicia a contagem regressiva em 3
            
                // Função que atualiza o elemento de contagem regressiva
                function updateCountdown() {
                countdownElement.textContent = count
                count--
            
                if (count < 0) {
                    // Quando a contagem regressiva chegar a zero, inicia o jogo
                    countdownElement.style.display = "none"
                    startGame()
                } else {
                    // Aguarda 1 segundo e atualiza a contagem regressiva
                    setTimeout(updateCountdown, 1000)
                }
                }
            
                // Inicia a atualização da contagem regressiva
                updateCountdown()
            }
        
            // Função para iniciar o jogo
            function startGame() {
                let tempoInicio = 0
                let tempoDecorrido = 0
                let cronometro
                let audio = document.getElementById("backgroundMusic")
                
                const tempoElemento = document.getElementById("tempo")
                
                function iniciarTimer() {
                        tempoInicio = Date.now()
                        cronometro = setInterval(atualizarTempo, 1)
                        audio.play()
                }
                
                function atualizarTempo() {
                    const agora = Date.now()
                    tempoDecorrido = (agora - tempoInicio) / 1000
                    localStorage.setItem("minha-pontuacao", tempoDecorrido.toFixed(3))
                    tempoElemento.textContent = tempoDecorrido.toFixed(3)
                }

                iniciarTimer()
                
                const bot = new Image()
                bot.src = 'img/v-razor.png'
                bot.style.width = '10%'
                bot.style.position = 'absolute'
                bot.id = 'bot'

                function tamanhoTela() {
                    return {
                        altura: window.innerHeight,
                        largura: window.innerWidth
                    }
                }

                function posicaoAleatoria() {
                    //const botWidth = tamanhoTela().largura * 0.2
                    //const botHeight = tamanhoTela().altura * 0.2
                    //const maxX = tamanhoTela().largura - botWidth
                    //const maxY = tamanhoTela().altura - botHeight
                    //return {
                        //posicaoX: Math.floor(Math.random() * maxX),
                        //posicaoY: Math.floor(Math.random() * maxY)
                    //}
                    return {
                        posicaoX: Math.random() * (8 - -8) + -8,
                        posicaoY: Math.random() * (5 - -5) + -5,
                        posicaoZ: Math.random() * (2 - -2) + -2
                    }
                }

                let intervalId, tempoFinal, botsClicados

                function adicionarBot() {
                    const { posicaoX, posicaoY, posicaoZ } = posicaoAleatoria()
                    const novoBot = document.createElement('a-image')
                    novoBot.setAttribute('src', 'img/v-razor.png')
                    novoBot.setAttribute('width', '2')
                    novoBot.setAttribute('height', '2')
                    novoBot.setAttribute('position', `${posicaoX} ${posicaoY} ${posicaoZ+ -8}`)
                    novoBot.setAttribute('id', 'bot')
                    novoBot.setAttribute('class', 'clickable')
                    novoBot.setAttribute('cursor-listener', true)

                    novoBot.addEventListener('mouseenter', function () {
                        this.parentNode.removeChild(this)
                        botsClicados++
                        if (botsClicados >= 100) {
                        clearInterval(intervalId)
                        clearInterval(cronometro)
            
                        audio.pause()
            
                        botsClicados = 100
                        const qtyAcertos = botsClicados
                        localStorage.setItem("acertos", qtyAcertos)
            
                        let xmlhttp = new XMLHttpRequest()
                        xmlhttp.open("GET", `salvar-pontuacao?pontuacaoAtual=${localStorage.getItem("minha-pontuacao")}`, true)
                        xmlhttp.send()
                        window.location.href = "gameover"
                        } else {
                        adicionarBot()
                        }
                    })

                    document.querySelector('a-scene').appendChild(novoBot)
                }

                function criarBots() {
                    for (let i = 0; i < 4; i++) {
                        adicionarBot()
                    }
                }

                function iniciarJogo() {
                    let tempo = 0
                    intervalId = null
                    botsClicados = 0
                    criarBots()

                    intervalId = setInterval(() => {
                        tempo++
                        if (tempo >= 60) {
                            clearInterval(intervalId)
                            clearInterval(cronometro)

                            audio.pause()

                            const minhaPontuacao = 60.000.toFixed(3)
                            localStorage.setItem("minha-pontuacao", minhaPontuacao)
                            const acertos = botsClicados
                            localStorage.setItem("acertos", acertos)

                            let xmlhttp = new XMLHttpRequest()
                            xmlhttp.open("GET", `salvar-pontuacao?pontuacaoAtual=${minhaPontuacao}`, true)
                            xmlhttp.send()

                            window.location.href = "gameover"
                        }
                    }, 1000)

                    setTimeout(() => {
                        clearInterval(intervalId)
                        clearInterval(cronometro)

                        audio.pause()

                        const minhaPontuacao = 60.000.toFixed(3)
                        localStorage.setItem("minha-pontuacao", minhaPontuacao)
                        const acertos = botsClicados
                        localStorage.setItem("acertos", acertos)

                        let xmlhttp = new XMLHttpRequest()
                        xmlhttp.open("GET", `salvar-pontuacao?pontuacaoAtual=${minhaPontuacao}`, true)
                        xmlhttp.send()

                        window.location.href = "gameover"
                    }, 60 * 1000)
                }

                iniciarJogo()
            }
        </script>
    </body>
</html>
