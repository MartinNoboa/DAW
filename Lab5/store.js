function contar() {
    let cantidad = [];
    cantidad[0] = document.getElementById("picks").value;
    cantidad[1] = document.getElementById("strap").value;
    cantidad[2]= document.getElementById("cuerdas").value;
    
    
    let precios = [20,150,200];
    let total_sinIVA = [];
    let total_IVA = [];
    
    for(let i = 0; i < cantidad.length; i++){
        total_sinIVA[i] = cantidad[i]*precios[i]; 
        total_IVA[i] = total_sinIVA[i] * 1.28;
    }
    
    
    let total = 0;
    let IVA = 0;
    for(let i = 0; i < total_IVA.length; i++){
        total += total_IVA[i];
        IVA += total_IVA[i] - total_sinIVA[i];
    }
    write(cantidad, total_sinIVA,total, IVA);
    
   
}


function write(cantidad,precios, total,IVA) {
    document.getElementById("cp").innerHTML = cantidad[0];
    document.getElementById("cs").innerHTML = cantidad[1];
    document.getElementById("cc").innerHTML = cantidad[2];
    
    document.getElementById("tp").innerHTML = precios[0];
    document.getElementById("ts").innerHTML = precios[1];
    document.getElementById("tc").innerHTML = precios[2];
    
    
    document.getElementById("total").innerHTML = total - IVA;
    document.getElementById("IVA").innerHTML =IVA.toFixed(2);
    document.getElementById("final").innerHTML = total.toFixed(2);
    
}






