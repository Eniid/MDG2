console.log('coucou! ')

document.body.classList.remove("no-js"); 
document.body.classList.add("js"); 

window.onload = () => {
    window.addEventListener("scroll", () => {

        //? Hauteur total de la page
        let hauteur_page = document.documentElement.scrollHeight; 

        //? Hauteur viewport
        let hauteur_viewport = window.innerHeight; 

        //? Pausition actuelle du scrool
        let position = window.scrollY 

        //? Hauteur total de mon contener
        let hauteur_elmt = document.getElementById("hauteur").offsetHeight;  // Hauteurr de la jaucge de progression


        //TODO Formule magique ou on mélange le tout 🔮
        let progress=  hauteur_elmt / (hauteur_page - hauteur_viewport) * position; 

        document.getElementById("progress").style.height = progress +"px"

    })
}





const annimElt = document.getElementsByClassName("annim"); 

console.log(annimElt);

function annime(){
    console.log("coucou");
    
    oneElt.classList.add('annimation_suite')
}

for(var i= 0; i < annimElt.length; i++)
{
    let oneElt = annimElt[i];
    oneElt.classList.add('annimation')
    console.log(oneElt);
}


window.addEventListener("scroll", e => { // On fait en sorte que l'action se passe lorsque qu'on scrolle
document.querySelectorAll(".annim").forEach(element => { // On boucle sur tous les éléments qui ont la class annim
    const scrollDeLaPage = window.pageYOffset; // On récupère le scroll de la page
    const positionDeLElement = element.offsetTop; // Puis la position de l'élément .annim
    const tailleDeLaPage = window.innerHeight // et on prend la taille de la page
    if (scrollDeLaPage >= positionDeLElement - tailleDeLaPage + 200) { // Si on est plus bas que l'élément en bas + 200px (à modifier si tu veux que l'event se passe plus tôt)
        element.classList.add("animation_suite"); // on ajoute la class
    }
})
}, false)


document.addEventListener("click", e=>{
    const el = e.target;
    if(el.classList.contains("lightbox_image")){
        e.preventDefault()
        const checkbox = document.querySelector("#lightbox");
        const lightbox = document.querySelector(".lightboxContainer")
        lightbox.innerHTML = ""
        const image = document.createElement("img")
        image.src = el.parentElement.getAttribute("href")
        lightbox.insertAdjacentElement("beforeend", image)
        checkbox.checked = true
        console.log("bouuu");
        
        return false; 
    }
    if(el.classList.contains("lightbox")){
        const checkbox = document.querySelector("#lightbox");
        checkbox.checked = false
    }
})