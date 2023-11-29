let interval;
let sec=0;
let min=0;
let hr=0;
let points=0;

function twoDigits(digit){ //fins esteticos coloca ozero na frente
  if(digit<10){
      return('0'+digit)
  }else
  {
      return(digit)
  }
}

function start(){
  Cronometro()
  interval= setInterval(Cronometro,10)
  let inimigosElements = document.getElementsByClassName("enemy");
  for (const element of inimigosElements) {
    let inimigoElement = element;
    inimigoElement.style.animationPlayState = 'running';
  }
}


function Cronometro(){
  sec++
  if(sec==60){
      min++
      sec=0
      points=points+2;
      if(min==60){
          min=0
          hr++
      }
  }
  document.getElementById('Cronometro').innerText=twoDigits(hr)+':'+twoDigits(min)
  document.getElementById('Pontos').innerText=+twoDigits(points)

}

////spawan js 
let x = 225;
let y= 650;
document.addEventListener("keydown",function(event)
{
    let tecla = event.key
    switch(tecla) {
      case "d":
      if(x<450) {
        x = x + 15
        document.getElementById("teemo").style.left=x+"px"
      }
      break;
      case"a":
      if(x>0) {
        x = x - 15
        document.getElementById("teemo").style.left=x+"px"
      }
      break;
      case"w":
      if(y>0) {
        y = y - 15
        document.getElementById("teemo").style.top=y+"px"
      }
      break;
      case"s":
      if(y<650) {
        y = y + 15
        document.getElementById("teemo").style.top=y+"px"
      }
      break;
    }
})
// Função para verificar colisão atualziado

const player = document.getElementById("teemo");
const inimigo1 = document.getElementById("Skarner");
const inimigo2 = document.getElementById("Singed");
const inimigo3 = document.getElementById("Malphite");

function verificarColisao() {
  const playerRect = player.getBoundingClientRect();
  const enemies = [inimigo1, inimigo2, inimigo3];

  for (const inimigos of enemies) {
    const enemyRect = inimigos.getBoundingClientRect();

    if (
      playerRect.left < enemyRect.right &&
      playerRect.right > enemyRect.left &&
      playerRect.top < enemyRect.bottom &&
      playerRect.bottom > enemyRect.top
    ) {
      console.log("Meu ferrão trará uma morte hedionda");
    }
  }
}

setInterval(verificarColisao, 50);
