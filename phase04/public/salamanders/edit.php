<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 
if(!isset($_GET['id'])) {
    redirect_to(url_for('salamanders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()){

    $salamander = [];
    $salamander['id'] = $id;
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = update_salamander($salamander);
    redirect_to(url_for('salamanders/show.php?id=' . $id));

} else {
    $salamander = find_salamander_by_id($id);
    
    $salamander_set = find_all_salamanders();
    $salamander_count = mysqli_num_rows($salamander_set);
    mysqli_free_result($salamander_set);
}

?>
<div id="content">
 <h1>Edit Salamander</h1>
    <form action="<?php echo url_for('salamanders/edit.php?id='. h(u($id))); ?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo h($salamander['name']); ?>"><br>

        <label for="habitat">Habitat</label>
        <input type="text" name="habitat" value="<?php echo h($salamander['habitat']); ?>"><br>

        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo h($salamander['description']); ?>"><br>

        <input type="submit" value="Edit salamander">

    </form>
</div>
<?php 
include(SHARED_PATH . '/salamander-footer.php'); ?>
