<?php require_once('../../private/initialize.php'); ?>

<?php  require_login_trader();
$auctions_set = find_all_auctions();

?>

<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">
<head>
<title> Προβολή Δημοπρασιών </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
</head>
<?php echo display_session_message(); ?>
		<div id="logo">
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
      ID: <?php echo $_SESSION['producer_id'] ?? ' '; ?>
		</div>
		<br>
<h1 class="auctions1">Δημοπρασίες </h1>

<form class="back_btn" action="<?php echo url_for('/traders/index.php'); ?>">
  <input type="image" src="back.png" alt="Submit"  width="100" height="50">
</form>
<form class="back_btn" action="<?php echo url_for('/traders/insert_offer.php'); ?>">
  <input type="image" src="makeoffer.png" alt="Submit"  width="100" height="50">
</form>
    
<div id="content3">
  <div class="auctions listing">


    <table class="list">
      <tr class="menu">
        <th> Κωδικός Δημοπρασίας</th>
        <th> Κωδικός Παραγωγού </th>
        <th> Κωδικός </th>
        <th> Περιγραφή </th>
        <th> Αρχική Τιμή </th>
        <th> Ημερομηνία έναρξης</th>
        <th> Τιμή Έναρξης </th>
        <th> Ημερομηνία Λήξης </th>
        <th> Ώρα Λήξης </th>
        <th> &nbsp; </th>
        <th> &nbsp; </th>
      </tr>

  <?php while($auction_set = mysqli_fetch_assoc($auctions_set)) { ?>
      <tr>
          <td class="id1"><?php echo h($auction_set['id']); ?></td>
          <td><?php echo h($auction_set['id_pro']); ?></td>
          <td><?php echo h($auction_set['code']); ?></td>
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
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
