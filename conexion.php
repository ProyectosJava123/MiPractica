<?php

function conectar(){
    $user ="root";
    $pass ="";
    $server = "localhost";
    $db ="encuestas";
    $con = new mysqli($server, $user, $pass, $db);

    return $con;
}

function select($con, $tabla, $where){

    $sql = "SELECT * FROM ".$tabla." ".$where;
    $result = $con->query($sql);
    return $result;
}

function insert($con, $tabla, $campos, $values){

    $sql = "INSERT INTO ".$tabla." (".$campos.") VALUES (".$values.")";
    if($con->query($sql) === TRUE){
        return true;
    } else {
        return false;
    }
}

function update($con, $tabla, $update, $where){

    $sql = "UPDATE ".$tabla." SET ".$update." WHERE ".$where;
    if($con->query($sql) === TRUE){
        return true;
    } else {
        return false;
    }
}

function getVeces($con, $id, $value){
    $sql = "SELECT * FROM resultados WHERE fk_pregunta=".$id;
    $sql2 = "SELECT * FROM resultados WHERE fk_pregunta=".$id." AND respuesta='$value'";
    
    $result = $con->query($sql);
    
    $result2 = $con->query($sql2);
    $parcial = $result2->num_rows;
    $total = $result->num_rows;
    $cadena = "".$parcial." elegida de ".$total." veces respondida.";
    return $cadena;
    
}

function delete($con, $tabla, $where){
    $sql = "DELETE FROM ".$tabla." ".$where;
    $con->query($sql);
    
}

?>