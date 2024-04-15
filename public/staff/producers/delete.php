<?php

require_once('../../../private/initialize.php');

require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/producers/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_producer($id);
  $_SESSION['message'] = 'The producer was deleted successfully';
  redirect_to(url_for('/staff/producers/index.php'));

} else {
  $producer = find_producer_by_id($id);
}

?>

<?php $page_title = 'Delete Producer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/producers/index.php'); ?>">&laquo; Back to List</a>

  <div class="producer delete">
    <h1>Delete Producer</h1>
    <p>Are you sure you want to delete this producer?</p>
    <p class="item"><h1>Producer: <?php echo h($producer['last_name']) . " " . h($producer['first_name']); ?></h1></p>

    <form action="<?php echo url_for('/staff/producers/delete.php?id=' . h(u($producer['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Producer" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
