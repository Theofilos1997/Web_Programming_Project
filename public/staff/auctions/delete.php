<?php

require_once('../../../private/initialize.php');

require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/auctions/index.php'));
}


$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_auction($id);
  $_SESSION['message'] = 'Auction deleted.';
  redirect_to(url_for('/staff/auctions/index.php'));
} else {
  $auction = find_auction_by_id($id);
}

?>

<?php $page_title = 'Delete Auction'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/auctions/index.php'); ?>">&laquo; Back to List</a>

  <div class="auctions delete">
    <h1>Delete Auction</h1>
    <p>Are you sure you want to delete this auction?</p>
    <div id="item">
      ID auction:<?php echo h($auction['id']); ?><br />
      ID producer:<?php echo h($auction['id_pro']); ?><br />
      Code_product:<?php echo h($auction['code']); ?><br />
      Description:<?php echo h($auction['description']); ?><br />
    </div>


    <form action="<?php echo url_for('/staff/auctions/delete.php?id=' . h(u($auction['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Auction" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
