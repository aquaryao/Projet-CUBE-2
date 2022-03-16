let left =  document.getElementById("gauche");
let right = document.getElementById("droite");
let photo = document.getElementsByClassName('img-centre');
let reserve = ["../img/2.png"];

function gauche (){
    reserve.push(photo[0].src);
    console.log(reserve);
    photo[0].src = reserve.shift();
}

function droite(){
    reserve.push(photo[0].src);
    console.log(reserve);
    photo[0].src = reserve.shift();
}

left.addEventListener("click", gauche);
right.addEventListener("click", droite);
