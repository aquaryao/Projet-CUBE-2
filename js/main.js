
function change(id,idcontent){
    document.querySelector('#onglet-ALL').classList.remove('onglet-actif');
    document.querySelector('#onglet-Multi').classList.remove('onglet-actif');
    document.querySelector('#onglet-Solo').classList.remove('onglet-actif');
    document.getElementById(id).classList.add('onglet-actif');
    document.querySelector('#page-ALL').style.display='none';
    document.querySelector('#page-Multi').style.display='none';
    document.querySelector('#page-Solo').style.display='none';
    document.getElementById(idcontent).style.display='flex';
}