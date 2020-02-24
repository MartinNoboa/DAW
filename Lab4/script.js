function recibirNum() {
    let num = prompt("Introduzca un numero: ");
    while (isNaN(num)){
        num = prompt("Introduzca un valor numerico: ");
    }
    
    generarArreglo(num);
}

function generarArreglo(n) {
    let numeros =[];
    for(let i = 0; i < n; i++){
        numeros[i] = i+1;
    }
    
    /*for(let i = 0; i < n; i++){
        console.log(numeros[i]);
    }
    */
    generarTabla(numeros , n);
}

function generarTabla(numeros, n) {
    let table = document.createElement("table");
    let row = table.insertRow();
    let count = 0;
    for(let i of numeros) { 
        let cell = row.insertCell();
        cell.innerHTML = i;
        count++;
        if (count%5==0) {
            row = table.insertRow();
        }
    }
    document.getElementById("tabla").appendChild(table);
}


