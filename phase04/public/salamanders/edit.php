<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 
$id = $_GET['id'];

$salamander = find_salamander_by_id($id);
<div id="content">
 <h1>Edit Salamander</h1>
    <form action="<?php echo url_for('salamanders/edit.php?id='. h(u($id))); ?>" method="post">
        <label for="name">
        <input type="text" name="name" value="<?php echo h($salamander['name']); ?>"><br>

        <label for="habitat">
        <input type="text" name="habitat" value="<?php echo h($salamander['habitat']); ?>"><br>

        <label for="description">
        <input type="text" name="description" value="<?php echo h($salamander['description']); ?>"><br>

        <input type="submit" value="Edit salamander">

    </form>
</div>

include(SHARED_PATH . '/salamander-footer.php'); ?>
