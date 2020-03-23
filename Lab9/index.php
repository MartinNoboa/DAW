<?php
//funciones

//-----------------------------promedio
function promedio($arreglo){
  return array_sum($arreglo)/count($arreglo);
}

function testPromedio_1(){
  $arreglo1 = array(2,2,4,4,6);
  return promedio($arreglo1);
}

function testPromedio_2(){
  $arreglo1 = array(10, 10, 10);
  return promedio($arreglo1);
}
//-----------------------------mediana

function median($arreglo){
  asort($arreglo);
  $paridad = count($arreglo)%2;
  $index = round(count($arreglo)/2)-1;
  
  if($paridad == 0):
    $median = ($arreglo[$index] + $arreglo[$index + 1])/2;

  elseif($paridad == 1):
    $median = $arreglo[$index];
  endif;


  return $median;
}

function testMedian_1(){
  $arreglo1 = array(7, 8, 9, 10, 11, 12);
  return median($arreglo1);
}

function testMedian_2(){
  $arreglo1 = array(10, 10, 5,10 ,10);
  return median($arreglo1);
}

//-----------------------------mostrar valores

function imprimir($array){
  for($i = 0; $i < count($array); $i++){
      print_r($array[$i]." ");
  }
}


function testMostrar_1(){
  $arreglo1 = array(12,10,8,11,9,7);
  imprimir($arreglo1);
}


function promedioMostrar_1(){
 $arreglo1 = array(7, 8, 9, 10, 11, 12);
 return promedio($arreglo1);
}

function medianMostrar_1(){
 $arreglo1 = array(7, 8, 9, 10, 11, 12);
 return median($arreglo1); 
}

function sortAsc(){
    $arreglo = array(7, 8, 9, 10, 11, 12);
    sort($arreglo);
    imprimir($arreglo);   
}

function sortDesc(){
    $arreglo = array(7, 8, 9, 10, 11, 12);
    rsort($arreglo);
    imprimir($arreglo);   
}

//--------------------------------------------tabla de valores

function generarTabla($array, $cuadrados, $cubos, $n){
    for($i = 0; $i <= $n; $i++){
        echo '<tr>';
        echo "<td> $array[$i] </td>";
        echo "<td> $cuadrados[$i] </td>";
        echo "<td> $cubos[$i] </td>";
        echo '</tr>';
    }
}

function generarNumeros(){
    $n = 5;
    $numeros = array();
    $cuadrados = array();
    $cubos = array();
    
    for($i = 0; $i <= $n; $i++){
        $numeros[$i] = $i;
    }
    
    for($i = 0; $i <= $n; $i++){
        $cuadrados[$i] = $numeros[$i]*$numeros[$i];
    }
    
    for($i = 0; $i <= $n; $i++){
        $cubos[$i] = $numeros[$i]*$numeros[$i]*$numeros[$i];
    }
    
    
  
    generarTabla($numeros, $cuadrados, $cubos, $n);
}



//pagina html
    include("_header.html");
    include("_top.html");
    include("_promedio.html");
    include("_median.html");
    include("_mostrarNum.html");
    include("_table.html");
    include("_footer.html");


?>