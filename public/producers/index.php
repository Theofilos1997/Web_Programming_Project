<?php require_once('../../private/initialize.php');
require_login_producer()
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
		<title> Παραγωγός</title>
	</head>

  <?php echo display_session_message(); ?>


		<div id="logo">
			<h1> Παραγωγός </h1>
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
			ID: <?php echo $_SESSION['producer_id'] ??  ' '; ?>
		</div>

		<div id="options">

			<br> <br> <br>
			<ul>
				<li> <a href="newaution.php"> Νέα Δημοπρασία </li>
				<li> <a href="producers_auctions.php">Οι Δημοπρασίες μου </li>
				<li> <a href="<?php echo url_for('/producers/logout.php'); ?>"> Αποσύνδεση Χρήστη </li>
			</ul>
		</div>
		<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
	</body>

</html>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
