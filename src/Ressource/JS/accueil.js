// Accordion
const accordion = document.getElementsByClassName("contentBox");
for (i = 0; i< accordion.length; i++ ){
    accordion[i].addEventListener('click', function () {
        this.classList.toggle('act')
    })
}



// popup
const popup = document.getElementsByClassName("popup");
function filtre() {
    const x = document.getElementById("popup");
    if (x.style.display === "none") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}



// compteur option coche
// const checkedBox = document.querySelectorAll('input[type=checkbox], input[type=radio]');
//
// let checkedCount = 0;
//
//
// for (let i = 0; i < checkedBox.length; i++) {
//     console.log('dfsdsfdfs')
//     if (checkedBox[i].checked) {
//         checkedCount = checkedCount +1;
//
//         console.log("OK");
//     }
// }
//
//
// const compteur = document.querySelector('#checkedCount');
//
// compteur.innerHTML = ' (' + checkedCount +')';
//
//
// console.log('Cases cochés : ' + checkedCount);



const compteur = document.querySelector('#checkedCount');

var checkBox = document.querySelectorAll('input[type="checkbox"]');
var nbChecked = 0
for(var i = 0; i < checkBox.length; i++) {
    checkBox[i].addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        nbChecked = checkboxes.length;
        compteur.innerHTML = ' (' + nbChecked +')';
        console.log(nbChecked);
    });
}


var inputs = document.querySelectorAll('input[type="radio"]');
for(var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', function() {
        var radios = document.querySelectorAll('input[type="radio"]:checked');
        nbChecked = nbChecked + radios.length;
        compteur.innerHTML = ' (' + nbChecked +')';
        console.log(nbChecked);
    });
}

