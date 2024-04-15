<?php

require_once('../../../private/initialize.php');

require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/offers/index.php'));
}


$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_offer($id);
  $_SESSION['message'] = 'Offer deleted.';
  redirect_to(url_for('/staff/offers/index.php'));
} else {
  $auction = find_offer_by_id($id);
}

?>

<?php $page_title = 'Delete Offer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/offers/index.php'); ?>">&laquo; Back to List</a>

  <div class="offer delete">
    <h1>Delete Offer</h1>
    <p>Are you sure you want to delete this offer?</p>
    <div id="item">
      Code_Auction:<?php echo h($auction['code_auction']); ?><br />
      Code_Trader:<?php echo h($auction['code_trader']); ?><br />
      Price_Offer:<?php echo h($auction['price_offer']); ?><br />
      Date:<?php echo h($auction['date']); ?><br />
      Time:<?php echo h($auction['time']); ?><br />
    </div>


    <form action="<?php echo url_for('/staff/offers/delete.php?id=' . h(u($offer['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Offer" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
