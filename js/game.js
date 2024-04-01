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

// Chama a função para iniciar a contagem regressiva
startCountdown()
