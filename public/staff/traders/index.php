<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>
<?php
  $trader_set = find_all_traders();
?>

<?php $page_title = 'Trader'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="traders listing">
    <h1>Traders</h1>

    <div class="actions">
      <a class="actions" href="<?php echo url_for('/staff/traders/new.php'); ?>"> Create New Trader</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Last name</th>
        <th>First name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

  <?php while($trader = mysqli_fetch_assoc($trader_set)) { ?>
      <tr>
          <td><?php echo h($trader['id']); ?></td>
          <td><?php echo h($trader['last_name']); ?></td>
          <td><?php echo h($trader['first_name']); ?></td>
          <td><?php echo h($trader['username']); ?></td>
    	    <td><?php echo h($trader['password']); ?></td>
          <td><?php echo h($trader['address']); ?></td>
          <td><?php echo h($trader['phone']); ?></td>
          <td><?php echo h($trader['email']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/traders/show.php?id=' . h(u($trader['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/traders/delete.php?id=' . h(u($trader['id']))); ?>">Delete</a></td>
    	 </tr>
  <?php } ?>
</table>

<?php mysqli_free_result($trader_set); ?>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
