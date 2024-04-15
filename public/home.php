<?php require_once('../private/initialize.php'); ?>


<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">
<head>
<title> Αρχική </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/main.css'); ?>" />
</head>

<h2>Καλώς ορίσατε στην ιστοσελίδα Agroticabet!</h2>
<div class="cn">
<section  class="content1">
 <h3>Επιλέξτε την ιδιότητά σας<h3>
 <button><a href = "<?php echo url_for('/traders/new.php'); ?>">Έμπορος</a></button>
 <button ><a href = "<?php echo url_for('/producers/new.php'); ?>">Παραγωγός</button>
</section>
</div>
</body>
</html>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>