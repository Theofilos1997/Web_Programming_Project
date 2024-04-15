<?php require_once('../../../private/initialize.php'); ?>

<?php  require_login(); ?>

<?php
  $auctions_set = find_all_auctions();
?>

<?php $page_title = 'Auctions'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="auctions listing">
    <h1>Auctions</h1>

    <table class="list">
      <tr>
        <th>ID_auctions</th>
        <th>ID_Producer</th>
        <th>Code</th>
        <th>Count</th>
        <th>Description</th>
        <th>Start_Price</th>
        <th>Start_Date</th>
        <th>Time_Start</th>
        <th>End_Date</th>
        <th>End_Time</th>
        <th>Active</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

  <?php while($auction_set = mysqli_fetch_assoc($auctions_set)) { ?>
      <tr>
          <td><?php echo h($auction_set['id']); ?></td>
          <td><?php echo h($auction_set['id_pro']); ?></td>
          <td><?php echo h($auction_set['code']); ?></td>
          <td><?php echo h($auction_set['count']); ?></td>
          <td><?php echo h($auction_set['description']); ?></td>
          <td><?php echo h($auction_set['start_price']); ?></td>
    	    <td><?php echo h($auction_set['date_start']); ?></td>
          <td><?php echo h($auction_set['time_start']); ?></td>
          <td><?php echo h($auction_set['date_end']); ?></td>
          <td><?php echo h($auction_set['time_end']); ?></td>
          <td><?php echo h($auction_set['active']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/auctions/edit.php?id=' . h(u($auction_set['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/auctions/delete.php?id=' . h(u($auction_set['id']))); ?>">Delete</a></td>
    	 </tr>
  <?php } ?>
</table>

<?php mysqli_free_result($auctions_set); ?>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
