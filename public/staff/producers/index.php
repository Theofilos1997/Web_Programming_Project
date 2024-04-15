<?php require_once('../../../private/initialize.php'); ?>

<?php  require_login(); ?>

<?php
  $producer_set = find_all_producers();
?>

<?php $page_title = 'Producers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="producers listing">
    <h1>Producers</h1>

    <div class="actions">
      <a class="actions" href="<?php echo url_for('/staff/producers/new.php'); ?>"> Create New Producer</a>
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

  <?php while($producer = mysqli_fetch_assoc($producer_set)) { ?>
      <tr>
          <td><?php echo h($producer['id']); ?></td>
          <td><?php echo h($producer['last_name']); ?></td>
          <td><?php echo h($producer['first_name']); ?></td>
          <td><?php echo h($producer['username']); ?></td>
    	    <td><?php echo h($producer['password']); ?></td>
          <td><?php echo h($producer['address']); ?></td>
          <td><?php echo h($producer['phone']); ?></td>
          <td><?php echo h($producer['email']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/producers/show.php?id=' . h(u($producer['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/producers/delete.php?id=' . h(u($producer['id']))); ?>">Delete</a></td>
    	 </tr>
  <?php } ?>
</table>

<?php mysqli_free_result($producer_set); ?>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
