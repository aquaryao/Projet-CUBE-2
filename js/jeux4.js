const MAX_HEIGHT = 16;
const MAX_WIDTH = 8;

let score = 0;
let speed = 100;

let board = [];

for (let i=0; i<MAX_HEIGHT; i++){
  for (let j=0; j<MAX_WIDTH; j++) {
    if (board[i] == undefined) {
      board[i] = [];
    }
    board[i][j] = -1;
  }
}

let colors = [ 'aqua', 'fuchsia', 'orange', 'navy'];

let pieceBar = [
  [
    [ 0, 0, 0, 0],
    [ 1, 1, 1, 1],
    [ 0, 0, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0]  
  ],
  [
    [ 0, 0, 0, 0],
    [ 1, 1, 1, 1],
    [ 0, 0, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0]  
  ]
];

let pieceT = [
  [
    [ 0, 0, 0, 0],
    [ 1, 1, 1, 0],
    [ 0, 1, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 1, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 1, 1, 1, 0],
    [ 0, 0, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 0, 1, 1, 0],
    [ 0, 1, 0, 0],
    [ 0, 0, 0, 0]  
  ]
];

let pieceL = [
  [
    [ 0, 0, 0, 0],
    [ 1, 1, 1, 0],
    [ 1, 0, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 1, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 0, 1, 0],
    [ 1, 1, 1, 0],
    [ 0, 0, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 1, 0],
    [ 0, 0, 0, 0]  
  ]
];

let pieceJ = [
  [
    [ 0, 0, 0, 0],
    [ 1, 1, 1, 0],
    [ 0, 0, 1, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 1, 1, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 1, 0, 0, 0],
    [ 1, 1, 1, 0],
    [ 0, 0, 0, 0],
    [ 0, 0, 0, 0]  
  ],
  [
    [ 0, 1, 1, 0],
    [ 0, 1, 0, 0],
    [ 0, 1, 0, 0],
    [ 0, 0, 0, 0]  
  ]
];


let pieceTypes = [
  pieceBar,
  pieceT,
  pieceL,
  pieceJ,  
];

/*

currentPîece = {
type: 0,
rotation: 0,
initialRow: 15,
initialCol: 2,
}
*/



function getRandomPiece() {
  return {
    type: Math.floor( pieceTypes.length*Math.random()),
    rotation: 0,
    initialRow: MAX_HEIGHT-1,
    initialCol: Math.floor(MAX_WIDTH / 2) -2,
  };
}

function cleanLines() {
  for (let i=MAX_HEIGHT-1; i>=0; i--) {
    // la ligne est pleine ?
    let full = true;
    for (let j=0; j< MAX_WIDTH; j++) {
      if (board[i][j] < 0) {
        full = false;
      }
    }
    if (full) {
      score += 300;
      for (let k=i; k< MAX_HEIGHT-1; k++) {
        board[k] = board[k+1];
      } 
      for (let j=0; j< MAX_WIDTH; j++) {
        board[MAX_HEIGHT-1][j] = -1;
      }
    }
  }
  
  for (let i=0; i<MAX_HEIGHT; i++) {
    for (let j=0; j<MAX_WIDTH; j++) {
      document.querySelector(`#tile-${i}-${j}`).classList = ""
      document.querySelector(`#tile-${i}-${j}`).classList.add('tile');      
      document.querySelector(`#tile-${i}-${j}`).classList.add(colors[board[i][j]]);
    }
  }
}

function solidifyPiece() {
  
  let  pieceTiles = pieceTypes[currentPiece.type][currentPiece.rotation];
  console.log('Solidify');
  for (let i=0; i<4; i++) {
    for (let j=0; j<4; j++) {
      if (pieceTiles[i][j] != 0) {
        board[currentPiece.initialRow-i][currentPiece.initialCol+j] =
          currentPiece.type;
      }
    }
  }
  cleanLines();
  console.log(board);
}

function drawPiece() {
  
  let  pieceTiles = pieceTypes[currentPiece.type][currentPiece.rotation];
  
  for (let i=0; i<4; i++) {
    for (let j=0; j<4; j++) {
      if (pieceTiles[i][j] != 0) {
        // maintenant je dois trouver la position dans le puits
        // et la donner une couleur `color`        
        let row = currentPiece.initialRow - i;
        let col = currentPiece.initialCol + j;     
        document.querySelector(`#tile-${row}-${col}`)
            .classList.add(colors[currentPiece.type]);
      }
    }
  }  
}

function deletePiece() {
  
  let  pieceTiles = pieceTypes[currentPiece.type][currentPiece.rotation];
  
  for (let i=0; i<4; i++) {
    for (let j=0; j<4; j++) {
      if (pieceTiles[i][j] != 0) {
        // maintenant je dois trouver la position dans le puits
        // et la donner une couleur `color`        
        let row = currentPiece.initialRow - i;
        let col = currentPiece.initialCol + j;   
              
        document.querySelector(`#tile-${row}-${col}`)
            .classList.remove(colors[currentPiece.type]);
      }
    }
  }  
}

function isLegalPosition(currentPiece) {
  
  let  pieceTiles = pieceTypes[currentPiece.type][currentPiece.rotation];
  
  for (let i=0; i<4; i++) {
    for (let j=0; j<4; j++) {
      if (pieceTiles[i][j] != 0) {
        // maintenant je dois trouver la position dans le puits
        // et la donner une couleur `color`        
        let row = currentPiece.initialRow - i;
        let col = currentPiece.initialCol + j;     
        // Vérifions qu'on ne touche pas le sol
        if (row < 0  || col < 0 || col >= MAX_WIDTH) {
           return false
         }
        console.log(row, '-', col)
        console.log(board[row][col], board[row][col] > -1)
        if (board[row][col] > -1) {
          return false;
        }
      }
    }
  }  
  return true;
}

function turnPiece() {  
    
  let newPiece =  { ...currentPiece };
  newPiece.rotation =  (currentPiece.rotation+1) % 4;
  
  if (isLegalPosition(newPiece)) {
    deletePiece();
    currentPiece.rotation = newPiece.rotation;
    drawPiece();
    return true;
  } 
  return false;
}

function moveRightPiece() {
  let newPiece =  { ...currentPiece };
  newPiece.initialCol++;  
  
  if (isLegalPosition(newPiece)) {
    deletePiece();
    currentPiece.initialCol = newPiece.initialCol;
    drawPiece();
    return true;
  } 
  return false;
}

function moveLeftPiece() {
  let newPiece =  { ...currentPiece };
  newPiece.initialCol--;  
  
  if (isLegalPosition(newPiece)) {
    deletePiece();
    currentPiece.initialCol = newPiece.initialCol;
    drawPiece();
    return true;
  } 
  return false;
}

function moveDownPiece() {  
  let newPiece =  { ...currentPiece };
  newPiece.initialRow--;  
  
  if (isLegalPosition(newPiece)) {
    score += 10;
    deletePiece();
    currentPiece.initialRow = newPiece.initialRow;
    drawPiece();
    return true;
  } 
  solidifyPiece();
  return false;
}

function rotateMoveDownAndWait() {
  
  console.log('Initial row', currentPiece.initialRow)
  turnPiece();
  if (moveDownPiece()) {
    setTimeout(rotateMoveDownAndWait, 500); 
    return true;
  }
  console.log('Create piece!')
  createPiece();
  return false;  
}


function rotateAndWait() {
  turnPiece(currentPiece); 
  setTimeout(rotateAndWait, 500); 
}


function createPiece() {
  currentPiece = getRandomPiece();
  console.log('Got random piece');
  if (isLegalPosition(currentPiece)) { 
    console.log('I can draw it');
    drawPiece();
    return true;
  } 
  console.log('I cannot draw it')
  currentPiece = undefined;
  console.log('end');  
  return false;
}

function doKeyDown(evt) {
  if (currentPiece == undefined) {
    return;
  }
  console.log(' I have pressed a key', evt);
  
  switch (evt.key) {
    case 'q':
    case 'a':
    case 'A': moveLeftPiece();
              break;
    case 'd':
    case 'D': moveRightPiece();
              break;
    case 's': 
    case 'S': moveDownPiece();
              break;
    case ' ':
    case 'z':
    case 'Z':
    case 'w':
    case 'W': turnPiece();
              break;
  }
}

function waitAndDown() {
  speed = 100+score/50;
  document.querySelector('#score').innerHTML = `Score: ${score} - Speed: ${speed}`
  if (moveDownPiece()) {
    setTimeout(waitAndDown, 50000/speed);
    return true;
  }
  if (createPiece()) {
    setTimeout(waitAndDown, 50000/speed);
    return true;
  }
  return false; 
}


document.addEventListener('keydown', doKeyDown)

let currentPiece;
createPiece();  
setTimeout(waitAndDown, 500);
