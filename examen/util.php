<?php
function connectDB() {
    $servername = 'mysql1008.mochahost.com';
    $username = "dawbdorg_1704052";
    $password = "1704052";
    $dbname = "dawbdorg_A01704052";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    //Checks connection
    if(!$con) {
        http_response_code(500);
        return false;
    }
    return $con;
}

function closeDb($mysqli) {
    mysqli_close($mysqli);
}

//Función que conecta a la bd, realiza un query y vuelve a cerrar la bd. Recibe el SQL del query y regresa un objeto mysqli result
function sqlqry($qry) {
    $con = connectDb();
    if(!$con){
        return false;
    }

    $result = mysqli_query($con, $qry);
    closeDb($con);
    return $result;
}

/*
    Función para simplificar la inserción correcta a la bd. Recibe el código SQL donde los valores q insertar se representan con '?'
    E.g. INSERT INTO frutas (nombre, familia, precio) VALUES (?,?,?)
    Los valores se pasan como argumentos, deben ser correspondientes al numero de '?'. Se puede usar un arreglo como parámetro precedido de '...'
    E.g. insertIntoDb($sql, $nom, $fam, $precio)   insertIntDb($sql, ...$arrayWithValues)
    Regresa en indice del elemento insertado
*/
function insertIntoDb($dml, ...$args) {
    $conDb = connectDb();
    $types='';
    //Verifica los tipos de variable de los argumentos y termina el proceso si no son int, double, string o BLOB
    foreach ($args as $arg) {
        $types.=substr(gettype($arg),0,1);
        if(preg_match('/[^idsb]/', $types)) {
            die("Invalid argument, only Int, double, string and BLOB accepted");
        }
    }
    if ( !($statement = $conDb->prepare($dml)) ) {
        die("Error: (" . $conDb->errno . ") " . $conDb->error);
        return 0;
    }
    //Unir los parámetros de la función con los parámetros de la consulta
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param($types, ...$args)) {
        die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
    //Executar la consulta
    if (!$statement->execute()) {
        die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
    $id = $conDb->insert_id;
    closeDb($conDb);
    return $id;
}

function modifyDb($dml) {
    $conDb = connectDb();

    $conDb->query($dml);
    $res=mysqli_affected_rows($conDb);

    closeDb($conDb);
    return $res;
}

function agregarIncidente($idLugar, $idIncidente) {
    $sql = "CALL agregarIncidente($idLugar, $idIncidente);";
    return sqlqry($sql);
    //print_r(mysqli_error($res));
}

function getOpciones($id, $campo, $tabla) {
    $sql = "SELECT $id, $campo FROM $tabla";
    $result = sqlqry($sql);
    $option = "";

    while($row = mysqli_fetch_array($result)){
        $option = $option."<option value=".$row[0].">".ucfirst($row[1])."</option>";
    }

    return $option;
}


function mostrarIncidentes() {
    $qry = "CALL mostrarIncidentes()";

    $incidentes = sqlqry($qry);
    $tabla = "
    <table class=\"highlight\">
        <thead>
            <tr>
                <th>Lugar</th>
                <th>Incidente</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>";

    while ($row = mysqli_fetch_array($incidentes, MYSQLI_BOTH)) {
        $tabla .= "<tr>";
        $tabla .= "<td>".ucfirst($row['lugar'])."</td>";
        $tabla .= "<td>".ucfirst($row['incidente'])."</td>";
        $tabla .= "<td>".$row['fecha']."</td>";
        $tabla .= "</tr>";
    }
    $tabla .= "</tbody></table>";
    return $tabla;
}

?>
