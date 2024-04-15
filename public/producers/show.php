<?php require_once('../../private/initialize.php'); ?>

<?php require_login_producer(); ?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$producer = find_producer_by_id($id);

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

<h2>The producer was created successfully!</h2>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/home.php'); ?>">&laquo; Back to List</a>

  <div class="producer show">

    <h1>Producer: <?php echo h($producer['last_name']) . " " . h($producer['first_name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($producer['username']); ?></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><?php echo h($producer['password']); ?></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><?php echo h($producer['address']); ?></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><?php echo h($producer['phone']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($producer['email']); ?></dd>
      </dl>
    </div>

  </div>

</div>
