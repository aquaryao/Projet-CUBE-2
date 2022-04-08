let bombRow;
let bombColumn;
let tries;
let ready;

function doClick(id) {
  
  if (!ready) {
    return;
  }
  
  console.log('clicked on #'+id);
  // id row-column
  // let bomb = 'tile'+bombRow+'-'+bombColumn;
  let bomb = `tile-${bombRow}-${bombColumn}`;

  tries++; 
  
  
  console.log(`The bomb is in ${bomb}`);

  if ( bomb == id) {
    console.log('Found the bomb!'); 
    ready = false;
    document.querySelector('#'+id).classList.add('bomb');
    document.querySelector('#tries').innerHTML = `You have found the bomb in ${tries} tries`;
    setTimeout(reset, 2000);
  } else {
    console.log('Search again...');
    document.querySelector('#'+id).classList.add('empty');
    document.querySelector('#tries').innerHTML = `You have done ${tries} tries`;
  }
}

function reset() {
  ready = true;
  bombRow = Math.floor(4*Math.random()); // random row 0,1,2,3
  bombColumn = Math.floor(4*Math.random()); // random column 0,1,2,3
  tries = 0;

  console.log('The bomb is in tile #'+bombRow+'-'+bombColumn);
  
  document.querySelector('#tries').innerHTML='Find the bomb, quickly!';
  for (let row=0; row < 4; row++) {
    for (let col=0; col < 4; col++) {
      let tile = document.querySelector(`#tile-${row}-${col}`);
      tile.classList.remove('bomb');
      tile.classList.remove('empty');
    }
  }
}


reset();