<?php require_once('../../private/initialize.php');
require_login_trader();
?>
<?php
date_default_timezone_set("Europe/Athens");
$t = time();
$auctions_set = find_all_auctions();

if(is_post_request()) {

  $offer = [];
  $offer['code_auction'] = $_POST['code_auction'] ?? ' ';
  $offer['code_trader'] = $_POST['code_trader'] ?? ' ';
  $offer['price_offer'] = $_POST['price_offer'] ?? ' ';
  $offer['date'] = $_POST['date'] ?? ' ';
	$offer['time'] = $_POST['time'] ?? ' ';

  $result = insert_offer($offer);

	if($result === true) {
    $_SESSION['message'] = 'The offer was created successfully';
		$sql="SELECT * FROM `offers` WHERE id=(SELECT MAX(id) FROM `offers`)";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result);
			$id = $row['id'];

    redirect_to(url_for('/traders/show_offer.php?id=' . $id));
  } else {
    $errors = $result;
  }

} else {
	$offer = [];
	$offer['code_auction'] =  ' ';
	$offer['code_trader'] =' ';
	$offer['price_offer'] = ' ';
	$offer['date'] = ' ';
	$offer['time'] = ' ';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		   <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

 		<title> Εισαγωγή Προσφοράς </title>
	</head>


  <?php echo display_session_message(); ?>


		<div id="logo">
			User: <?php echo $_SESSION['username_trader'] ?? ' '; ?>
			ID: <?php echo $_SESSION['trader_id'] ?? ' '; ?>

		</div>

		<div id="content">
		<br>
<form class="back_btn" action="<?php echo url_for('/traders/index.php'); ?>">
  <input type="image" src="back.png" alt="Submit"  width="100" height="50">
</form>
		  

		  <div class="insert_offer">
		    <h3 class="offer">Δημιουργία Προσφοράς</h3>

		    <?php echo display_errors($errors); ?>

		    <form action="<?php echo url_for('/traders/insert_offer.php'); ?>" method="post">
		      <dl>
		        <dt> Κωδικός Δημοπρασίας </dt>
		        <dd><select name="code_auction">
		          <?php
		            while ($auction_set = mysqli_fetch_assoc($auctions_set)){
		              $code_auction =$auction_set["id"];
		              echo "<option>
		                    $code_auction
		                    </option>";
		            }
		     			?>
		          </select>
		        </dd>
		      </dl>

		      <dl>
		        <dt> Κωδικός Εμπόρου </dt>
		        <dd><input type="text" name="code_trader" value="<?php echo $_SESSION['trader_id'];?>" readonly></dd>
		        </dd>
		      </dl>

		      <dl>
		        <dt> Τιμή Προσφοράς </dt>
		        <dd><input type="number" step="0.01" name="price_offer" value="<?php echo h($offer['price_offer']); ?>" /></dd>
		      </dl>

		      <dl>
		        <dt> Ημερομηνία </dt>
		        <dd><input type="date" name="date" value="<?php echo date('Y-m-d');?>" /><br /></dd>
		      </dl>

		      <dl>
		        <dt> Ώρα </dt>
		        <dd><input type="time" name="time" value="<?php echo date('H:i:s');?>" /></dd>
		      </dl>

		      <div id="operations">
		        <input type="submit" value="Δημιουργία Προσφοράς" />
		      </div>
		    </form>

		  </div>

		</div>
		<br/> <br/>
	</body>

</html>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>