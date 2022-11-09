let comment =document.getElementById("comments");
let commentaire =document.getElementById("commentaire");
let ajouter=document.getElementById("ajouter");
let contenaire=document.querySelectorAll('')

console.log(ajouter);
function ajout(){
let div=document.createElement("div");
let p=document.createElement("p");
p.innerHTML=commentaire.value;
contenaire.append(div);
div.append(p);
}
ajouter.addEventListener("click",ajout)
