function validar() {
    
    let nombre = document.getElementById("usuario").value;
    let contrasenia = document.getElementById("pass").value;
    let correct = /[a-zA-Z]{8,}[0,9]/;
    //necesita minimo 8 caracteres y al menos 1 numero
    if(contrasenia.match(correct) && nombre.length != 0) {
        alert("Correcto");
    }else if(nombre.length == 0){
        alert("Ingrese un usuario");
    }
     else if(!contrasenia.match(correct)){
        alert("Minimo 8 caracteres y 1 numero");
    }
}
