function validaForm(){
    if (controllaCAP()){   
        if(document.myForm.remember.checked) {
            window.alert("Hai scelto di ricordarti per i prossimi accessi")
        }
        else{
            window.alert("Hai scelto di non ricordarti per i prossimi accessi")
        }
    }
}

function controllaCAP(){
    if (document.myForm.inputCap.value.length!=5){
        alert("Il CAP deve contenere 5 cifre");
        return false;
    }
    var cap=parseInt(document.myForm.inputCap.value);
    if (isNaN(cap)){
        alert("Il CAP deve essere un numero");
        return false;
    }
    return true;
}