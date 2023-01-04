/**
 * @type {HTMLFormElement}
 */
const inputImages = document.querySelector("#images")
/**
 * @type {HTMLFormElement}
 */
const inputZip = document.querySelector("#ressources")
/**
 * @type {HTMLElement}
 */
const labelImages = document.querySelector("#labelImages")
/**
 * @type {HTMLElement}
 */
const labelZip = document.querySelector("#labelZip")

function updateImages (){
    const curfiles = inputImages.files;
    if(curfiles.length === 0){
        labelImages.innerHTML = "<b>+</b> <br/> Ajouter des images <br/> 0 Fichiers"
    }
    else{
        labelImages.innerHTML = "<b>+</b> <br/> Ajouter des images <br/>"+curfiles.length + " Fichiers"
    }
}

function updateZip(){
    const curfiles = inputZip.files;
    if(curfiles.length === 0){
        labelZip.innerHTML = "<b>+</b> <br/> Ajouter un zip <br/> Aucun fichier"
    }
    else{
        labelZip.innerHTML = "<b>+</b> <br/> Ajouter un zip <br/>"+curfiles[0].name
    }
}

inputImages.addEventListener("change", updateImages)
inputZip.addEventListener("change", updateZip)