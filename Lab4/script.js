//-------------------------------------------------------------------------problema 1
function recibirNum() {
    let num = prompt("Introduzca un numero: ");
    while (isNaN(num)){
        num = prompt("Introduzca un valor numerico: ");
    }
    
    generarArreglo(num);
}

function generarArreglo(n) {
    let numeros =[];
    for(let i = 1; i <= n; i++){
        numeros.push(i, i*i,i*i*i);
    }
    
    /*for(let i = 0; i < n; i++){
        console.log(numeros[i]);
    }
    */
    generarTabla(numeros);
}

function generarTabla(numeros, n) {
    let table = document.createElement("table");
    let row = table.insertRow();
    let count = 0;
    for(let i of numeros) { 
        let cell = row.insertCell();
        cell.innerHTML = i;
        count++;
        if (count%3==0) {
            row = table.insertRow();
        }
    }
    document.getElementById("tabla").appendChild(table);
}



//-------------------------------------------------------------------------problema 2

function suma() {
    let nums = [Math.round((Math.random()*20)+1) , Math.round((Math.random()*100)+1) ];
    let tiempoInicio = new Date();
    let respuesta = prompt("Cual es el resultado de " + nums[0] + " + " + nums[1] + "?");
    
    while(isNaN(respuesta)){
        respuesta = prompt("Ingrese un valor numerico. \nCual es la suma de " + nums[0] + " + " + nums[1] + "?");
        
    }
    
    //console.log(respuesta);
    alert(((nums[0] + nums[1] == respuesta)?"Correcta":"Incorrecta") + " en " + (new Date() - tiempoInicio)/1000 );
}


//-------------------------------------------------------------------------problema 3

function numeros () {
    let a = [];
    for(let i = 0; i < 20; i++){
        a[i] = Math.round(Math.random()*20 - 10);
    }
    
    
    revisarNumeros(a);
}

function revisarNumeros(numeros) {
    let contador = [0,0,0];
    
    for (let i in numeros){
        if(numeros[i] < 0){
            contador[0]++;
        }else if (numeros[i] == 0) {
            contador[1]++;
        }else if (numeros[i] > 0) {
            contador[2]++;
        }
    }
    
    mostrarMensaje(contador);
    return contador;
}

function mostrarMensaje (contador){
    alert("Cantidad de numeros negativos = " + contador[0] + "\nCantidad de ceros = " + contador[1]+ "\nCantidad de positivos = " + contador[2]);
}

//-------------------------------------------------------------------------problema 4

function arreglo() {
    
}

//-------------------------------------------------------------------------problema 5

function recibirNumero() {
    let valor = 0;
    valor = prompt("Ingrese un numero: ");
    while(isNaN(valor)){
        valor = prompt("Ingrese un numero: ");
    }
    aux = valor.toString(10).split('').map(Number);
    console.log(aux);
    mostrar(aux);
    
}

function invertirNumero(num) {
    let aux = [];
    aux = num.reverse();
    return aux;
}

function mostrar(num){
    alert(invertirNumero(num));
}



















