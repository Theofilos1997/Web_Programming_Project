<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/traders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_trader($id);
  $_SESSION['message'] = 'The trader was deleted successfully';
  redirect_to(url_for('/staff/traders/index.php'));

} else {
  $trader = find_trader_by_id($id);
}

?>

<?php $page_title = 'Delete Trader'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/traders/index.php'); ?>">&laquo; Back to List</a>

  <div class="traders delete">
    <h1>Delete Traders</h1>
    <p>Are you sure you want to delete this trader?</p>
    <p class="item"><h1>Trader: <?php echo h($trader['last_name']) . " " . h($trader['first_name']); ?></h1></p>

    <form action="<?php echo url_for('/staff/traders/delete.php?id=' . h(u($trader['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Trader" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
