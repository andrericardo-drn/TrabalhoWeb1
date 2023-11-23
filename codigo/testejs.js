const player = document.getElementById("rocket");
const enemy1 = document.getElementById("singed");
const enemy2 = document.getElementById("malphite");
const enemy3 = document.getElementById("skarner");
const timeElement = document.getElementById("time");

let playerX = 125;
let playerSpeed = 20;
let score = 0;
let time = 0;
let gameInterval;

// Função para atualizar a posição dos inimigos
function resetEnemyPositions() {
  enemy1.style.top = "0px";
  enemy2.style.top = "0px";
  enemy3.style.top = "0px";
  enemy1.style.left = "30px";
  enemy2.style.left = "125px";
  enemy3.style.left = "220px";
}

function updatePlayerPosition() {
  player.style.left = playerX + "px";
}

function movePlayer(event) {
  switch (event.key) {
    case "ArrowLeft":
      if (playerX > 30) {
        playerX -= playerSpeed;
      }
      break;
    case "ArrowRight":
      if (playerX < 220) {
        playerX += playerSpeed;
      }
      break;
  }
  updatePlayerPosition();
}

function updateEnemies() {
  const enemies = [enemy1, enemy2, enemy3];
  for (const enemy of enemies) {
    const enemyTop = parseInt(window.getComputedStyle(enemy).top);
    enemy.style.top = enemyTop + 5 + "px";

    if (enemyTop > 500) {
      enemy.style.top = "0px";
    }

    const playerRect = player.getBoundingClientRect();
    const enemyRect = enemy.getBoundingClientRect();

    if (
      playerRect.left < enemyRect.right &&
      playerRect.right > enemyRect.left &&
      playerRect.top < enemyRect.bottom &&
      playerRect.bottom > enemyRect.top
    ) {
      alert("Você perdeu!");
      resetGame();
    }
  }
}

function resetGame() {
  score = 0;
  playerX = 125;
  updatePlayerPosition();
  resetEnemyPositions();
  alert("Jogo reiniciado!");
}

document.addEventListener("keydown", movePlayer);
setInterval(updateEnemies, 50);
