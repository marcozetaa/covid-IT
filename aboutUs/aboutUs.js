var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); 
}


function valida(){
  if((document.mess.name.value=="") || (document.mess.email.value=="")){
    swal("Devi inserire nome e email!","Non hai mandato il messaggio", "error");
    return false;
  }

  swal("Dati inseriti correttamente!","Hai mandato il messaggio", "success");
  return true;
}
