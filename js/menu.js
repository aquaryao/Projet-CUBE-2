//////////////////////////////Afficher/Cacher le menu//////////////////////////////
let boite = document.querySelector("nav");
let elements = document.querySelectorAll("nav p");
let header = document.getElementsByTagName("header");
let phone = document.getElementsByClassName('phone');
let grid = document.getElementById('grid');
let menu_side = document.getElementsByClassName('phone');
let bloc_droite = document.querySelector("header > div:nth-child(2)");
let bouton = document.getElementById("bouton");
bouton.addEventListener("click", affichermenu);
let fermer = document.getElementById('close');
fermer.addEventListener('click',cachermenu);

function affichermenu() {
    console.log("Afficher");
    bloc_droite.classList.remove('header-bloc-droite');
    for(let j = menu_side.length - 1 ; j > -1 ; j--){
        menu_side[j].classList.remove("menu-side");
    }
    bouton.classList.add('menu-side');
    for(let j = 0 ; j < elements.length ; j++){
        elements[j].classList.add("unhidden");
    }
    for(let j = 0 ; j < header.length ; j++){
        header[j].classList.add("header");
    }
    boite.classList.add("nav");
}

function cachermenu() {
    console.log("Cacher");
    bloc_droite.classList.add('header-bloc-droite');
    for(let j = menu_side.length - 1 ; j > -1 ; j--){
        menu_side[j].classList.add("menu-side");
    }
    bouton.classList.remove('menu-side');
    for(let j = 0 ; j < elements.length ; j++){
        elements[j].classList.remove("unhidden");
    }
    for(let j = 0 ; j < header.length ; j++){
        header[j].classList.remove("header");
    }
    boite.classList.remove("nav");
}


var timeout = false;
var delay = 250;

window.addEventListener('resize', function() {
    clearTimeout(timeout);
    if (window.innerWidth > 800) {
        timeout = setTimeout(cachermenu, delay);
    }
});