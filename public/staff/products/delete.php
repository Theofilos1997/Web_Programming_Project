<?php

require_once('../../../private/initialize.php');

require_login();
if(!isset($_GET['code'])) {
  redirect_to(url_for('/staff/products/index.php'));
}
$code = $_GET['code'];

if(is_post_request()) {

  $result = delete_product($code);
  $_SESSION['message'] = 'The product was deleted successfully';
  redirect_to(url_for('/staff/products/index.php'));

} else {
  $product = find_product_by_id($code);
}

?>

<?php $page_title = 'Delete Product'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/producers/index.php'); ?>">&laquo; Back to List</a>

  <div class="product delete">
    <h1>Delete Product</h1>
    <p>Are you sure you want to delete this product?</p>
    <div id="item">
      Code:<?php echo h($product['code']); ?><br />
      Kind:<?php echo h($product['kind']); ?><br />
      Description:<?php echo h($product['description']); ?><br />
      Payment:<?php echo h($product['payment']); ?><br />
    </div>

    <form action="<?php echo url_for('/staff/products/delete.php?code=' . h(u($product['code']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Product" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
