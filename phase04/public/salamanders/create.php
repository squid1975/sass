<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

if(is_post_request()){

    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $habitat = $_POST['habitat'] ?? '';
    $description = $_POST['description'] ?? '';

    echo "Salamander Form Parameters<br>"
    echo "Salamander name: " . $name . "<br>";
    echo "Salamander habitat: " . $habitat . "<br>";
    echo "Salamander description: " . $description . "<br>";
} else {
    redirect_to(url_for('salamanders/index.php'));
}

include(SHARED_PATH . '/salamander-footer.php'); 
?>
