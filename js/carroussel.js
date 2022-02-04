let gauche =  document.getElementById("gauche");
let droite = document.getElementById("droite");

let reserve = ["ex"];
let photo = document.getElementById("ex");
let photo1 = document.getElementById("ex");
let photo2 = document.getElementById("ex");


function gauche (){
    reserve.push(photo2.src);
    autreTexte.push(texte2.innerHTML);
    
    photo1.src = photo.src;
    
    photo.src = reserve.shift();
    texte.innerHTML = autreTexte.shift();
}

function droite(){
    reserve.push(photo.src);
    autreTexte.push(texte.innerHTML);
    
    photo1.src = photo2.src;
    
    photo2.src = reserve.shift();
    texte2.innerHTML = autreTexte.shift();
}

bouton.addEventListener("click", gauche);
bouton2.addEventListener("click", droite);