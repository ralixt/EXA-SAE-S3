// Accordion
const accordion = document.getElementsByClassName("contentBox");
let i;
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
const checked = document.querySelectorAll('input[type=checkbox], input[type=radio]');

let checkedCount = 0;


for (i = 0; i < checked.length; i++) {
    if (checked[i].checked) {
        checkedCount++;
        console.log("OK");
    }
}


const compteur = document.querySelector('#checkedCount');

compteur.innerHTML = '(' + checkedCount +')';


console.log('Cases cochés : ' + checkedCount);

