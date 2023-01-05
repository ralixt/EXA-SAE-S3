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





// const tag = document.querySelector(".tags");
const tags = document.querySelectorAll(".tags");
// const content = document.querySelector(".content")


for (i = 0; i< tags.length; i++ ){
    tags[i].addEventListener('click', function () {
        this.classList.toggle('d')
    })
}



// for(let i=0;i<content.length;i++) {
//     content[i].addEventListener('click',function (){
//         console.log("ok")
//         this.classList.toggle("d")
//     })
// }