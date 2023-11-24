<?php require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');
?>
<div id="content">
    <div class="new">
        <h1>Create Salamander</h1>

        <form action="<?php echo url_for('salamanders/create.php'); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value=""><br>
            <label for="habitat">Habitat:</label>
            <input type="text" name="habitat" value=""><br>
            <label for="description">Description</label>
            <input type="text" name="description" value=""></br>

            <input type="submit" value="Create salamander">
           
        </form>
    </div>
    <a href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a>
</div>
<?php
include(SHARED_PATH . '/salamander-footer.php'); ?>
