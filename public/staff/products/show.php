<?php

require_once('../../../private/initialize.php');

require_login();

$id = $_GET['id'] ?? ''; // PHP > 7.0
$product = find_product_by_id($id);

?>

<?php $page_title = 'Show Product'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/products/index.php'); ?>">&laquo; Back to List</a>

  <div class="product show">

    <h1>Product</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/$products/delete.php?id=' . h(u($product['code']))); ?>">Delete</a>
    </div>

    <div class="attributes">
      <dl>
        <dt>Code:</dt>
        <dd><?php echo h($product['code']); ?></dd>
      </dl>
      <dl>
        <dt>Kind:</dt>
        <dd><?php echo h($product['kind']); ?></dd>
      </dl>
      <dl>
        <dt>Description:</dt>
        <dd><?php echo h($product['description']); ?></dd>
      </dl>
      <dl>
        <dt>Payment:</dt>
        <dd><?php echo h($product['payment']); ?></dd>
      </dl>
    </div>

  </div>

</div>
