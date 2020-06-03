function ripristina(e){
    e.target.style.color="white";
}


function coloreHeader(e){
    e.target.style.color="rgb(235,184,29)";
}

function assegnaEvent(){
    var span2=document.getElementsByClassName("navbar");
    for(i=0;i<span2.length;i++){
        span2[i].addEventListener("mouseenter", coloreHeader);
        span2[i].addEventListener("mouseleave", ripristina);
    }

}