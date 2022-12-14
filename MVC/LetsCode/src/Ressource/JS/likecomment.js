var like=document.querySelector('.material-symbols-outlined');
var likes=document.querySelectorAll('.material-symbols-outlined');


function changement(e){

    // variable=like.className;

    console.log(like.className);

    // likes[i].classList.remove('filled');
    // likes[i].classList.add('filled');

    e.target.classList.toggle('filled');



}




for(let i=0;i<likes.length;i++){

    likes[i].addEventListener("click",changement);
}