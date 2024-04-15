<?php require_once('../../private/initialize.php');
require_login_trader();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
		<title> Έμπορος</title>
	</head>

  <?php echo display_session_message(); ?>


		<div id="logo">
			<h1> Έμπορος </h1>
      User: <?php echo $_SESSION['username_trader'] ?? ' '; ?>
			ID:  <?php echo $_SESSION['trader_id'] ?? ' '; ?>
		</div>

		<div id="options1">

			<br> <br> <br>
			<ul>
				<li> <a href="insert_offer.php"> Εισαγωγή Προσφοράς σε Δημοπρασία </a> </li>
				<li> <a href="view_auctions.php"> Προβολή Δημοπρασιών </a> </li>
				<li> <a href="trader_offers.php"> Οι Προσφορές μου </li>
				<li> <a href="<?php echo url_for('/traders/logout.php'); ?>"> Αποσύνδεση Χρήστη </li>
			</ul>
		</div>
		<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
	</body>

</html>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>