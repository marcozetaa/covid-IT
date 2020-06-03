function ripristina(e){
    e.target.style.color="white";
}


function coloreGiallo(e){
    e.target.style.color="rgb(235,184,29)";
}

function assegnaEvent(){
    var navbr=document.getElementsByClassName("navbar");
    for(i=0;i<navbr.length;i++){
        navbr[i].addEventListener("mouseenter", coloreGiallo);
        navbr[i].addEventListener("mouseleave", ripristina);
    }

}