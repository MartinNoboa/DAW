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

//falta comentar funcion
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}