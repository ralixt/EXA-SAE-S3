const paras = document.getElementById("text");
const comment = document.getElementsByClassName("textCommentaire");





if(paras.innerHTML.length>40) {
    paras.style.overflow = "scroll"
}

for (let com of comment) {
    if(com.innerHTML.length>180){
        console.log(com.innerHTML.length)
        com.style.overflow = "scroll"
    }
}
