<?php

require_once('../../../private/initialize.php');
  require_login();
$product_set = find_all_producers();
//$product_count = mysqli_num_rows($product_set) + 1;
mysqli_free_result($product_set);

if(is_post_request()) {

  $product = [];
  $product['code'] = $_POST['code'] ?? ' ';
  $product['kind'] = $_POST['kind'] ?? ' ';
  $product['description'] = $_POST['description'] ?? ' ';
  $product['payment'] = $_POST['payment'] ?? ' ';

  $result = insert_product($product);
  if($result === true) {
  //  $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The product was created successfully';
    redirect_to(url_for('/staff/products/show.php?id=' . $product['code']));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $product = [];
  $product['code'] = ' ';
  $product['kind'] = ' ';
  $product['description'] = ' ';
  $product['payment'] = ' ';
}

?>

<?php $page_title = 'Create Product'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/products/index.php'); ?>">&laquo; Back to List</a>

  <div class="product new">
    <h1>Create Product</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/products/new.php'); ?>" method="post">
      <dl>
        <dt>Code</dt>
        <dd><input type="text" name="code" value="<?php echo h($product['code']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Kind</dt>
        <dd><input type="text" name="kind" value="<?php echo h($product['kind']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><input type="text" name="description" value="<?php echo h($product['description']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Payment:</dt>
        <dd><input type="text" name="payment" value="<?php echo h($product['payment']); ?>" /></dd>
      </dl>

        <div id="operations">
        <input type="submit" value="Create Product" />
      </div>
    </form>
    <br />

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
