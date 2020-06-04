

function valida(){
  if((document.mess.name.value=="") || (document.mess.email.value=="")){
    swal("Devi inserire nome e email!","Non hai mandato il messaggio", "error");
    return false;
  }
  swal("Dati inseriti correttamente!","Hai mandato il messaggio", "success");
  return true;
}

