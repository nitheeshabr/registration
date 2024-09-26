let playerCount = 1;
const maxPlayers = 11;
const minPlayers = 1;

function addPlayer() {
    if (playerCount < maxPlayers) {
        playerCount++;
        let newPlayer = document.createElement('input');
        newPlayer.setAttribute('type', 'text');
        newPlayer.setAttribute('name', 'player_name[]');
        newPlayer.setAttribute('placeholder', `Player ${playerCount}`);
        document.getElementById('player-names').appendChild(newPlayer);
        document.getElementById('player-names').appendChild(document.createElement('br'));
    }
}

function removePlayer() {
    if (playerCount > minPlayers) {
        let playerNames = document.getElementById('player-names');
        playerNames.removeChild(playerNames.lastChild);
        playerNames.removeChild(playerNames.lastChild); // remove <br> too
        playerCount--;
    }
}

const registrationForm = document.getElementById('registration-form');
const subtotalElement = document.getElementById('subtotal-amount');

registrationForm.addEventListener('change', updateSubtotal);

function updateSubtotal() {
    let subtotal = 0;
    const games = registrationForm.querySelectorAll('input[name="game[]"]:checked');
    games.forEach(game => {
        subtotal += parseInt(game.getAttribute('data-price'));
    });
    subtotalElement.textContent = `₹${subtotal}`;

    // Update hidden input with the subtotal
    document.getElementById('total_amount').value = subtotal;
}
