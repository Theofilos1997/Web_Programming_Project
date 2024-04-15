<?php require_once('../../../private/initialize.php'); ?>

<?php  require_login(); ?>

<?php
  $offer_set = find_all_offers();
?>

<?php $page_title = 'Offers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="offers listing">
    <h1>Offers</h1>

    <table class="list">
      <tr>
        <th>Code_Auction</th>
        <th>Code_Trader</th>
        <th>Price_Offer</th>
        <th>Date</th>
        <th>Time</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

  <?php while($offer = mysqli_fetch_assoc($offer_set)) { ?>
      <tr>
          <td><?php echo h($offer['code_auction']); ?></td>
          <td><?php echo h($offer['code_trader']); ?></td>
          <td><?php echo h($offer['price_offer']); ?></td>
          <td><?php echo h($offer['date']); ?></td>
          <td><?php echo h($offer['time']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/offers/delete.php?id=' . h(u($offer['id']))); ?>">Delete</a></td>
    	 </tr>
  <?php } ?>
</table>

<?php mysqli_free_result($offer_set); ?>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
