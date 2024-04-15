<?php require_once('../../../private/initialize.php'); ?>

<?php  require_login(); ?>

<?php
  $product_set = find_all_products();
?>

<?php $page_title = 'Products'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="products listing">
    <h1>Products</h1>

    <div class="actions">
      <a class="actions" href="<?php echo url_for('/staff/products/new.php'); ?>"> Create New Producer</a>
    </div>

    <table class="list">
      <tr>
        <th>Code</th>
        <th>Kind</th>
        <th>Description</th>
        <th>Payment</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

  <?php while($product = mysqli_fetch_assoc($product_set)) { ?>
      <tr>
          <td><?php echo h($product['code']); ?></td>
          <td><?php echo h($product['kind']); ?></td>
          <td><?php echo h($product['description']); ?></td>
          <td><?php echo h($product['payment']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/products/show.php?id=' . h(u($product['code']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/products/delete.php?code=' . h(u($product['code']))); ?>">Delete</a></td>
    	 </tr>
  <?php } ?>
</table>

<?php mysqli_free_result($product_set); ?>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
