<?php require_once('../../private/initialize.php'); ?>

<?php  require_login_producer(); ?>
<?php
$id = $_GET['id'];

if(!isset($_GET['id'])) {
  redirect_to(url_for('producers/index.php'));
}
$auction = find_auction_by_id($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		   <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

 		<title>Show_Auction</title>
	</head>
  <?php echo display_session_message(); ?>

		<div id="data">
		<h1>Δημοπρασία </h1>
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
      ID: <?php echo $_SESSION['producer_id'] ?? ' '; ?>
		</div>
</body>
</html>
<br/>
<a class="back-link" href="<?php echo url_for('/producers/index.php'); ?>">&laquo; Back to Producer Home</a>

<div id="content">
  <div class="auctions listing">

    <div class="attributes">
      <dl>
        <dt>ID_auctions</dt>
        <dd><?php echo h($auction['id']); ?></dd>
      </dl>
      <dl>
        <dt>ID_Producer</dt>
        <dd><?php echo h($auction['id_pro']); ?></dd>
      </dl>
      <dl>
        <dt>Code</dt>
        <dd><?php echo h($auction['code']); ?></dd>
      </dl>
      <dl>
        <dt>Count</dt>
        <dd><?php echo h($auction['count']); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($auction['description']); ?></dd>
      </dl>
      <dl>
        <dt>Start_Price</dt>
        <dd><?php echo h($auction['start_price']); ?></dd>
      </dl>
      <dl>
        <dt>Start_Date</dt>
        <dd><?php echo h($auction['date_start']); ?></dd>
      </dl>
      <dl>
        <dt>Time_Start</dt>
        <dd><?php echo h($auction['time_start']); ?></dd>
      </dl>
      <dl>
        <dt>End_Date</dt>
        <dd><?php echo h($auction['date_end']); ?></dd>
      </dl>
      <dl>
        <dt>End_Time</dt>
        <dd><?php echo h($auction['time_end']); ?></dd>
      </dl>
    </div>

  </div>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
