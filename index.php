<?php
    setcookie("celular", "", time() - 3600, "/");
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <title>Desafio Panasonic V-Razor</title>

        <script src="https://aframe.io/releases/1.5.0/aframe.min.js"></script>
        <script src="https://unpkg.com/aframe-environment-component@1.1.0/dist/aframe-environment-component.min.js"></script>
        <script src="https://rawgit.com/mayognaise/aframe-gif-shader/master/dist/aframe-gif-shader.min.js"></script>
    </head>
    <body id="main-content">
        <a-scene>
            <a-sky src="#skyTexture"></a-sky>
            <a-assets>
                <img id="skyTexture" src="img/bg-main.webp">
                <img id="logotipo" src="img/logo-desafio.png">
                <img id="vrazor" src="img/v-razor.png">
                <img id="blur" src="img/fundo-com-desfoque.png">
                <img id="gif" autoplay loop="true" src="img/v-razor.gif">
            </a-assets>

            <a-entity id="home" position="0 0 0">
                <a-plane id="logoPlane" src="#logotipo" position="0 2 -7" opacity="0.99" width="5.8" height="3.3"></a-plane>

                <a-entity geometry="primitive: plane; width: 2; height: 0.5" material="color: #FFF" position="0 -1 -7" cursor-listener onclick="goToValidation()">
                    <a-text value="JOGAR" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>

            <a-entity id="validation" position="1000 0 0">
                <a-text value="Valide seu cadastro" align="center" position="0 4.5 -7" scale="2 2 2" color="#FFF"></a-text>
                <a-text value="Digite apenas numeros" align="center" position="0 4 -7" color="#FFF"></a-text>

                <a-entity geometry="primitive: plane; width: 5; height: 0.5" material="color: #F00" position="0 -1000 -2" id="msgerrorbox">
                    <a-text value="" id="msgerror" align="center" position="0 0 0" color="#FFF"></a-text>
                </a-entity>

                <!-- Texto digitado -->
                <a-entity geometry="primitive: plane; width: 4; height: 0.5;" material="color: #FFF" position="0 3.5 -7">
                    <a-text id="typedText" position="0 0 0"  color="#000" align="center"></a-text>
                </a-entity>

                <!-- Number Pad -->
                <a-entity id="keyboard" position="0 -0.5 -7">
                    <!-- Linha 1 -->
                    <a-entity class="row" position="0 3 0">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="1" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="2" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="3" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                    <!-- Linha 2 -->
                    <a-entity class="row" position="0 2 0">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="4" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="5" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="6" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                    <!-- Linha 3 -->
                    <a-entity class="row" position="0 1 0">
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="7" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="8" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="9" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                    <!-- Linha 4 -->
                    <a-entity class="row" position="0 0 0">
                        <a-entity geometry="primitive: plane; width: 0.9; height: 0.5;" material="color: #FFF" position="-1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="LIMPAR" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.8; height: 0.5;" material="color: #FFF" position="0 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="0" align="center" position="0 0 0" color="#000"></a-text>
                        </a-entity>
                        <a-entity geometry="primitive: plane; width: 0.9; height: 0.5;" material="color: #FFF" position="1 0 0" onclick="handleKeyClick(this)">
                            <a-text class="key" value="APAGAR" align="center" position="0 0 0" color="#000""></a-text>
                        </a-entity>
                    </a-entity>
                </a-entity>

                <a-entity geometry="primitive: plane; width: 2; height: 0.5;" material="color: #FFF" position="0 -1.5 -7" cursor-listener onclick="goToRules()">
                    <a-text value="VALIDAR" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>

            <a-entity id="rules" position="2000 0 0">
                <a-plane src="#blur" position="-8 1.6 -8" rotation="-15 25 0" width="6" height="8">
                    <a-text value="REGRAS" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="left" position="-2.5 3 0.1" scale="3 3 0" color="#FFF"></a-text>
                    <a-entity geometry="primitive: plane; width: 2; height: 1.5;" material="color: #FFD" position="-1.4 1.3 0.2">
                        <a-text value="TEMPO" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="center" position="0 0.3 0.1" color="#000" scale="1.5 1.5 0"></a-text>
                        <a-text value="60 segundos" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="center" position="0 -0.3 0.1" color="#000"></a-text>
                    </a-entity>
                    <a-entity geometry="primitive: plane; width: 2; height: 1.5;" material="color: #FFD" position="1.4 1.3 0.2">
                        <a-text value="V-RAZOR" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="center" position="0 0.3 0.1" color="#000" scale="1.5 1.5 0"></a-text>
                        <a-text value="150 cliques" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="center" position="0 -0.3 0.1" color="#000"></a-text>
                    </a-entity>
                    <a-text value="COMO JOGAR:" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="left" position="-2.4 -0.3 0.3" scale="3 3 0" color="#FFF"></a-text>
                    <a-plane width="4" height="3" src="#blur" position="0 0 .1">
                        <a-text value="Clique em todos os V-Razors;" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="left" position="-2.35 -1.3 0.1" color="#FFF" scale="1.5 1.5 0"></a-text>
                        <a-text value="Conclua o desafio no menor tempo" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="left" position="-2.35 -2 0.1" color="#FFF" scale="1.5 1.5 0"></a-text>
                        <a-text value="que conseguir;" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="left" position="-2.35 -2.3 0.1" color="#FFF" scale="1.5 1.5 0"></a-text>
                        <a-text value="Passe o laser em cima do V-Razor." font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="left" position="-2.35 -3 0.1" color="#FFF" scale="1.5 1.5 0"></a-text>
                    </a-plane>
                </a-plane>
                <a-video  src="#gif" width="10" height="10" rotation="0 -15 0" position="7 0 -10"></a-video>
                <a-entity geometry="primitive: plane; width: 2; height: 0.5;" material="color: #FFF" position="0 -2 -7" onclick="goToGame()">
                    <a-text value="VAMOS LA!" font="https://cdn.aframe.io/fonts/Aileron-Semibold.fnt" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>

            <a-entity id="game" position="3000 0 0">
                <a-entity geometry="primitive: plane; width: 2; height: 0.5;" material="color: #000" position="0 5.5 -7">
                    <a-text id="tempo" value="0.000" align="center" position="0 0 0" color="#FFF"></a-text>
                    <a-text id="countdown" position="-0.1 -3.9 4" color="#FFF"></a-text>
                </a-entity>

                <a-entity id="cursor" cursor="fuse: false;"></a-entity>
                <a-entity laser-controls="hand: right" raycaster="objects: .clickable"></a-entity>
                <a-entity laser-controls="hand: left" raycaster="objects: .clickable"></a-entity>
            </a-entity>

            <a-entity id="gameover" position="4000 0 0">
                <a-text position="0 2.5 -2.5" value="Fim de jogo..." color="#FFF" align="center"></a-text>
                <a-text position="-1 2 -3" value="Seu tempo:" color="#FFF" align="center"></a-text>
                <a-text position="0 2 -3" id="minha-pontuacao" value="34.590" color="#FFF" align="center"></a-text>
                <a-text position="0.4 2 -3"value="segundos" color="#FFF"></a-text>

                <a-text position="-0.85 1.5 -3" value="Quantidade de acertos:" color="#FFF" align="center"></a-text>
                <a-text position="0.56 1.5 -3" id="acertos" value="100" color="#FFF" align="center"></a-text>
                <a-text position="1.2 1.5 -3" value="cliques" color="#FFF" align="center"></a-text>

                <a-entity geometry="primitive: plane; width: 2; height: 0.5;" material="color: #FFF" position="0 -1 -7" onclick="goToHome()">
                    <a-text value="REINICIAR" align="center" position="0 0 0" color="#000"></a-text>
                </a-entity>
            </a-entity>
            
            <a-entity id="cursor" cursor="fuse: false; rayOrigin: mouse;"></a-entity>
            <a-entity laser-controls="hand: right" raycaster="objects: [geometry]"></a-entity>
            <a-entity laser-controls="hand: left" raycaster="objects: [geometry]"></a-entity>
        </a-scene>

        <audio id="backgroundMusic" src="./img/music.mp4"></audio>

        <!-- Navegação entre telas -->
        <script>
            const home = document.getElementById('home')
            const validation = document.getElementById('validation')
            const rules = document.getElementById('rules')
            const game = document.getElementById('game')
            const gameover = document.getElementById('gameover')

            function goToHome() {
                window.location.reload()
                localStorage.removeItem('minha-pontuacao')
                localStorage.removeItem('acertos')
            }

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
                                const msgerror = document.getElementById('msgerror')
                                const msgerrorbox = document.getElementById('msgerrorbox')
                                msgerrorbox.setAttribute('position', '0 1.6 -5')
                                msgerror.setAttribute('value', 'Usuario sem cadastro. Revise o numero digitado')

                                setTimeout(() => {
                                    msgerrorbox.setAttribute('position', '0 -1000 0')
                                }, 5 * 1000)


                            } else {
                                typedText.setAttribute('value', '')
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

            function goToGameover() {
                game.setAttribute('position', '-4000 0 0')
                gameover.setAttribute('position', '0 0 0')
                const pontuacao = window.localStorage.getItem("minha-pontuacao")
                const spanPontuacao = document.getElementById('minha-pontuacao')
                spanPontuacao.setAttribute('value', pontuacao)

                const acertos = window.localStorage.getItem("acertos")
                const spanAcertos = document.getElementById('acertos')
                spanAcertos.setAttribute('value', acertos)

                setTimeout(() => {
                    goToHome()
                }, 15 * 1000)
            }
        </script>

        <!-- Regras do game -->
        <script>
            function startCountdown() {
                var countdownElement = document.getElementById("countdown")
                var count = 5 // Inicia a contagem regressiva em 5
            
                // Função que atualiza o elemento de contagem regressiva
                function updateCountdown() {
                    countdownElement.setAttribute('value', count)
                    count--
                
                    if (count < 0) {
                        // Quando a contagem regressiva chegar a zero, inicia o jogo
                        countdownElement.setAttribute('position', '-2000 0 0')
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
                    tempoElemento.setAttribute('value', tempoDecorrido.toFixed(3))
                }

                iniciarTimer()

                function posicaoAleatoria() {
                    return {
                        posicaoX: Math.random() * (12 - -12) + -12,
                        posicaoY: Math.random() * (10 - -10) + -10,
                        posicaoZ: Math.random() * (3 - -3) + -3
                    }
                }

                let intervalId, tempoFinal, botsClicados

                function adicionarBot() {
                    const { posicaoX, posicaoY, posicaoZ } = posicaoAleatoria()
                    const novoBot = document.createElement('a-image')
                    novoBot.setAttribute('src', '#vrazor')
                    novoBot.setAttribute('width', '2')
                    novoBot.setAttribute('height', '2')
                    novoBot.setAttribute('position', `${posicaoX} ${posicaoY} ${posicaoZ+ -10}`)
                    novoBot.setAttribute('id', 'bot')
                    novoBot.setAttribute('class', 'clickable')
                    novoBot.setAttribute('cursor-listener', true)
                    novoBot.setAttribute('opacity', "0.99")

                    novoBot.addEventListener('mouseenter', function () {
                        this.parentNode.removeChild(this)
                        botsClicados++

                        if (botsClicados >= 150) {
                            clearInterval(intervalId)
                            clearInterval(cronometro)
                
                            audio.pause()
                
                            botsClicados = 150
                            const qtyAcertos = botsClicados
                            localStorage.setItem("acertos", qtyAcertos)
                
                            let xmlhttp = new XMLHttpRequest()
                            xmlhttp.open("GET", `salvar-pontuacao?pontuacaoAtual=${localStorage.getItem("minha-pontuacao")}`, true)
                            xmlhttp.send()
                            goToGameover()
                        } else {
                            botsClicados >= 147 ? null : adicionarBot()
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

                            goToGameover()
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

                        goToGameover()
                    }, 60 * 1000)
                }

                iniciarJogo()
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
    </body>
</html>
