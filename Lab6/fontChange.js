function changeFont() {
    let t = document.getElementById("change"); 
    let timer  = setTimeout(function(){
        t.style.color = "blue";
        t.style.fontSize = "70px";
        
    },1000);
    t.onmouseout = function(){
        clearTimeout(timer);
    }
}

