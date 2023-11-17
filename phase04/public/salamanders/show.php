<?php require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$sql = "SELECT * FROM salamanders ";
$sql .= "WHERE id='". $id ."'";
$result = mysqli_query($db, $sql);
confirm_result_set($result);

$salamander = mysqli_fetch_assoc($result);
mysqli_free_result($result);
$page_title = 'View Salamander';
include(SHARED_PATH . '/salamander-header.php'); 

?>


  <a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

   <p> Page ID: <?= h($id); ?> </p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
