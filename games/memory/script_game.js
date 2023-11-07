// Sélection des éléments du DOM par leur nom.
const selectors = {
    boardContainer: document.querySelector('.board-container'),  
    board: document.querySelector('.board'), 
    moves: document.querySelector('.moves'), 
    timer: document.querySelector('.timer'),  
    start: document.querySelector('button'),  
    win: document.querySelector('.win')  
}

// État du jeu et initialisation des variables.
const state = {
    gameStarted: false,  
    flippedCards: 0,  
    totalFlips: 0, 
    totalTime: 0,  
    loop: null  
}

// Fonction de mélange d'un tableau.
const shuffle = array => {
    const clonedArray = [...array]

    for (let index = clonedArray.length - 1; index > 0; index--) {
        const randomIndex = Math.floor(Math.random() * (index + 1))
        const original = clonedArray[index]

        clonedArray[index] = clonedArray[randomIndex]
        clonedArray[randomIndex] = original
    }

    return clonedArray
}

// Fonction pour sélectionner des éléments aléatoires d'un tableau.
const pickRandom = (array, items) => {
    const clonedArray = [...array]
    const randomPicks = []

    for (let index = 0; index < items; index++) {
        const randomIndex = Math.floor(Math.random() * clonedArray.length)
        
        randomPicks.push(clonedArray[randomIndex])
        clonedArray.splice(randomIndex, 1)
    }

    return randomPicks
}

// Fonction pour générer le jeu.
const generateGame = () => {
    const dimensions = selectors.board.getAttribute('data_dimension')

    // Vérification que la dimension de la grille est paire.
    if (dimensions % 2 !== 0) {
        throw new Error("La dimension de la grille doit être un nombre pair.")
    }

    // Liste d'émoticônes pour le jeu.
    const emojis = ['あ', 'い', 'う', 'え', 'お', 'か', 'き', 'く', 'け', 'け']
    const picks = pickRandom(emojis, (dimensions * dimensions) / 2) 
    const items = shuffle([...picks, ...picks])

    // Création des cartes du jeu en HTML.
    const cards = `
        <div class="board" style="grid-template-columns: repeat(${dimensions}, auto)">
            ${items.map(item => `
                <div class="card">
                    <div class="card-front"></div>
                    <div class="card-back">${item}</div>
                </div>
            `).join('')}
       </div>
    `
    
    // Utilisation d'un parseur pour transformer le HTML en éléments DOM.
    const parser = new DOMParser().parseFromString(cards, 'text/html')

    // Remplacement de la grille existante par la nouvelle grille générée.
    selectors.board.replaceWith(parser.querySelector('.board'))
}

// Fonction pour démarrer le jeu.
const startGame = () => {
    state.gameStarted = true  
    selectors.start.classList.add('disabled')  

    // Initialisation d'une boucle qui met à jour le temps écoulé.
    state.loop = setInterval(() => {
        state.totalTime++

        selectors.moves.innerText = `${state.totalFlips} mouvements`
        selectors.timer.innerText = `temps : ${state.totalTime} sec`
    }, 1000) 
}

// Fonction pour retourner les cartes face cachée.
const flipBackCards = () => {
    document.querySelectorAll('.card:not(.matched)').forEach(card => {
        card.classList.remove('flipped')
    })

    state.flippedCards = 0
}

// Fonction pour retourner une carte.
const flipCard = card => {
    state.flippedCards++
    state.totalFlips++

    if (!state.gameStarted) {
        startGame()
    }

    if (state.flippedCards <= 2) {
        card.classList.add('flipped')
    }

    if (state.flippedCards === 2) {
        const flippedCards = document.querySelectorAll('.flipped:not(.matched)')

        // Vérification si les cartes retournées correspondent.
        if (flippedCards[0].innerText === flippedCards[1].innerText) {
            flippedCards[0].classList.add('matched')
            flippedCards[1].classList.add('matched')
        }

        setTimeout(() => {
            flipBackCards() 
        }, 1000)
    }

    // Si toutes les cartes sont retournées (appariées), affichage message victoire.
    if (!document.querySelectorAll('.card:not(.flipped)').length) {
        setTimeout(() => {
            selectors.boardContainer.classList.add('flipped')  
            selectors.win.innerHTML = `
                <span class="win-text">
                    Vous avez gagné !<br />
                    avec <span class="highlight">${state.totalFlips}</span> mouvements<br />
                    en moins de <span class="highlight">${state.totalTime}</span> secondes
                </span>
            `

            clearInterval(state.loop)
        }, 1000)
    }
} 

// Fonction pour gerer la logique du jeu, retourner les cartes et de démarrer une nouvelle partie.
const attachEventListeners = () => {
    document.addEventListener('click', event => {
        const eventTarget = event.target
        const eventParent = eventTarget.parentElement

        // Gestion du clic sur les cartes du jeu.
        if (eventTarget.className.includes('card') && !eventParent.className.includes('flipped')) {
            flipCard(eventParent)
        } else if (eventTarget.nodeName === 'BUTTON' && !eventTarget.className.includes('disabled')) {
            startGame()  
        }
    })
}

// Génération du jeu.
generateGame()
attachEventListeners()