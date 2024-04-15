<?php require_once('../../private/initialize.php'); ?>

<?php  require_login_trader(); ?>
<?php
$id=$_SESSION['trader_id'];

$offers_set = find_offers_by_tr_id($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		   <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

 		<title>Προβολή Προσφορών</title>
	</head>
  <?php echo display_session_message(); ?>
		<div id="logo">
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
      ID: <?php echo $_SESSION['producer_id'] ?? ' '; ?>
		</div>
		<br>
		<h1 class="auctions1">Οι Προσφορές μου </h1>

</body>
</html>

<form class="back_btn" action="<?php echo url_for('/traders/index.php'); ?>">
  <input type="image" src="back.png" alt="Submit"  width="100" height="50">
</form>
<div id="content4">
  <div class="auctions listing">


    <table class="list">
      <tr class="menu">
        <th>Κωδικός Δημοπρασίας</th>
        <th>Κωδικός Εμπόρου</th>
        <th>Τιμή Προσφοράς</th>
        <th>Ημερομηνία</th>
        <th>Ώρα</th>
      </tr>

  <?php while($offer = mysqli_fetch_assoc($offers_set)) { ?>
      <tr>
          <td class="id1"><?php echo h($offer['code_auction']); ?></td>
          <td><?php echo h($offer['code_trader']); ?></td>
          <td class="end"><?php echo h($offer['price_offer']); ?></td>
          <td class="end"><?php echo h($offer['date']); ?></td>
          <td class="end"><?php echo h($offer['time']); ?></td>
       </tr>
  <?php } ?>
  </table>

<?php mysqli_free_result($offers_set); ?>

</div>

</div>
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
