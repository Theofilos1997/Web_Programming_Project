<?php require_once('../../private/initialize.php'); ?>

<?php require_login_trader(); ?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$offer = find_offer_by_id($id);

?>


<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">
<head>
<title> Προβολή Προσφορών </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/main.css'); ?>" />
</head>
<?php echo display_session_message(); ?>

<h2>The offer was created successfully!</h2>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/traders/index.php'); ?>">&laquo; Back to List</a>

  <div class="offer show">

    <h1>ID_Offer: <?php echo $id ?></h1>

    <div class="attributes">
      <dl>
        Κωδικος Δημπρασίας:
        <?php echo h($offer['code_auction']); ?>
      </dl>
      <dl>
        Κωδικος Εμπόρου:
        <?php echo h($offer['code_trader']); ?>
      </dl>
      <dl>
        Τιμή Προσφοράς:
      <?php echo h($offer['price_offer']); ?>
      </dl>
      <dl>
        Ημερομηνία:
        <?php echo h($offer['date']); ?>
      </dl>
      <dl>
		Ώρα:
      <?php echo h($offer['time']); ?>
      </dl>
    </div>

  </div>

</div>
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
