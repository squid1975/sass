<?php

function find_all_salamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result, $sql);
    return $result;
}

function find_salamander_by_id($id){
    global $db;
    $sql = "SELECT * FROM salamanders ";
    $sql .= "WHERE id='". $id ."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
    //returns assoc array
}

function insert_salamander($name, $habitat, $description) {
    global $db;

    $sql = "INSERT INTO salamanders ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "',";
    $sql .= "'" . $habitat . "',";
    $sql .= "'" . $description . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For insert statements, $result is true/false
    if($result){
        return true;
    } else {
        //INSERT failed
        echo mysqli_error($db);
        db_disconnect();
        exit;
    }
    
}