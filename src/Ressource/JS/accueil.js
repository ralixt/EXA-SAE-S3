// Accordion
const accordion = document.getElementsByClassName("contentBox");
let i;
for (i = 0; i< accordion.length; i++ ){
    accordion[i].addEventListener('click', function () {
        this.classList.toggle('act')
    })
}



// popup
function filtre() {
    const x = document.getElementById("popup");
    if (x.style.display === "none") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}



//compteur filtres
const compteurs = document.querySelectorAll('.JSfiltres');
let tmp = 0;
const checkBox = document.querySelectorAll('input[type="checkbox"]');
let nbChecked = 0;

for(i = 0; i < checkBox.length; i++) {
    checkBox[i].addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        if (tmp === 1){
            nbChecked = checkboxes.length + 1;
        }
        else {
            nbChecked = checkboxes.length;
        }
        compteurs[1].innerHTML = '<span class="material-symbols-outlined">filter_alt</span> Filtres (' + nbChecked +')';
        compteurs[0].innerHTML = 'Filtres (' + nbChecked +')';

        // console.log(nbChecked);
    });
}


const inputs = document.querySelectorAll('input[type="radio"]');
for(i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', function() {
        let radios = document.querySelectorAll('input[type="radio"]:checked');
        if (tmp !== 1){
            nbChecked = nbChecked + radios.length;
            tmp++;
        }
        compteur.innerHTML = ' (' + nbChecked +')';
        // console.log(nbChecked);
    });
}



