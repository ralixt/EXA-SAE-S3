const accordion = document.getElementsByClassName("contentBox");
for (i = 0; i< accordion.length; i++ ){
    accordion[i].addEventListener('click', function () {
        this.classList.toggle('act')
    })
}




const popup = document.getElementsByClassName("popup");





function filtre() {
    const x = document.getElementById("popup");
    if (x.style.display === "none") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}


