<?php require_once('../../private/initialize.php'); ?>

<?php  require_login_producer(); ?>
<?php
$id=$_SESSION['producer_id'];

$auctions_set = find_auction_by_pro_id($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		   <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

 		<title>Προβολή Δημοπρασιών</title>
	</head>
  <?php echo display_session_message(); ?>

		<div id="data">
		<br>
		<h1 class="mybids">Οι Δημοπρασίες μου </h1>
		<div id="logo">
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
      ID: <?php echo $_SESSION['producer_id'] ?? ' '; ?>
		</div>
	</div>
</body>
</html>

<form class="back_btn" action="<?php echo url_for('/producers/index.php'); ?>">
  <input type="image" src="back.png" alt="Submit"  width="100" height="50">
</form>

<div id="content2">
  <div class="auctions listing">
 

    <table class="list">
      <tr class="menu">
        <th>Κωδικός Δημοπρασίας</th>
        <th>Κωδικός</th>
				<th>Count</th>
        <th>Περιγραφή</th>
        <th>Τιμή εκκίνησης</th>
        <th>Ημερομηνία Έναρξης</th>
        <th>Ώρα Έναρξης</th>
        <th>Ημερομηνία Λήξης</th>
        <th>Ώρα Λήξης</th>
      </tr>

  <?php while($auction_set = mysqli_fetch_assoc($auctions_set)) { ?>
      <tr>
          <td class="id1"><?php echo h($auction_set['id']); ?></td>
          <td><?php echo h($auction_set['code']); ?></td>
		  <td><?php echo h($auction_set['count']); ?></td>
          <td><?php echo h($auction_set['description']); ?></td>
          <td class="price"><?php echo h($auction_set['start_price']); ?></td>
    	  <td class="start"><?php echo h($auction_set['date_start']); ?></td>
          <td class="start"><?php echo h($auction_set['time_start']); ?></td>
          <td class="end"><?php echo h($auction_set['date_end']); ?></td>
          <td class="end"><?php echo h($auction_set['time_end']); ?></td>
    	 </tr>
  <?php } ?>
</table>

<?php mysqli_free_result($auctions_set); ?>

</div>
</div>
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
