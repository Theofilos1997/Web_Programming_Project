<?php require_once('../../private/initialize.php'); ?>

<?php require_login_trader(); ?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$trader = find_trader_by_id($id);

?>


<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">
<head>
<title>showacount</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/main.css'); ?>" />
</head>
<?php echo display_session_message(); ?>

<h2>The trader was created successfully!</h2>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/home.php'); ?>">&laquo; Back to List</a>

  <div class="trader show">

    <h1>Trader: <?php echo h($trader['last_name']) . " " . h($trader['first_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($trader['username']); ?></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><?php echo h($trader['password']); ?></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><?php echo h($trader['address']); ?></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><?php echo h($trader['phone']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($trader['email']); ?></dd>
      </dl>
    </div>

  </div>

</div>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
