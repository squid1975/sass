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
    $sql = "SELECT * FROM salamander ";
    $sql .= "WHERE id='". $id ."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
    //returns assoc array
}

function insert_salamander($salamander) {
    global $db;

    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $salamander['name'] . "',";
    $sql .= "'" . $salamander['habitat'] . "',";
    $sql .= "'" . $salamander['description'] . "'";
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

function update_salamander($salamander) {
    global $db;
    $sql = "UPDATE salamander SET ";
    $sql .= "name='" . $salamander['name'] ."', ";
    $sql .= "habitat='" . $salamander['habitat'] ."', ";
    $sql .= "description='" . $salamander['description'] ."' ";
    $sql .= "WHERE id='" . $salamander['id'] ."'";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // update : results are true/false

    if($result){
        return true;
    } else {
        // UPDATE failed 
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_salamander($id) {
    global $db;
    
    $sql = "DELETE FROM salamander ";
      $sql .= "WHERE id='" . $id . "' ";
      $sql .= "LIMIT 1";

      $result = mysqli_query($db, $sql);

      //FOR DELETE, result is true/false
      if($result){
        return true;
      } else {
        //DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
}