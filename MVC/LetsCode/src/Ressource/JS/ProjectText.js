const paras = document.getElementById("text");
const comment = document.getElementsByClassName("textCommentaire");





if(paras.innerHTML.length>40) {
    paras.style.overflow = "scroll"
}

for (let com of comment) {
    if(com.innerHTML.length>90){
        com.style.overflow = "scroll"
    }
}
