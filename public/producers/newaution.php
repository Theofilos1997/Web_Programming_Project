<?php

require_once('../../private/initialize.php');
require_login_producer();
$products_set = find_all_products();

if(is_post_request()) {

  $auction = [];
  $auction['id_pro'] = $_SESSION['producer_id'];
  $auction['code'] = $_POST['code'] ?? ' ';
  $auction['count'] = $_POST['count'] ?? ' ';
  $auction['description'] = $_POST['description'] ?? ' ';
  $auction['start_price'] = $_POST['start_price'] ?? ' ';
  $auction['date_start'] = $_POST['date_start'] ?? ' ';
  $auction['time_start'] = $_POST['time_start'] ?? ' ';
  $auction['date_end'] = $_POST['date_end'] ?? ' ';
  $auction['time_end'] = $_POST['time_end'] ?? ' ';


  $result = insert_auction($auction);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The auction was created successfully';
    redirect_to(url_for('/producers/show_auction.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $auction = [];
  $auction['id_pro'] = $_SESSION['producer_id'] ;
  $auction['code'] = ' ';
  $auction['count'] = ' ';
  $auction['description'] = ' ';
  $auction['start_price'] = ' ';
  $auction['date_start'] = ' ';
  $auction['time_start'] = ' ';
  $auction['date_end'] = ' ';
  $auction['time_end'] =  ' ';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		   <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

 		<title>New_Auction</title>
	</head>

  <?php echo display_session_message(); ?>


		<br>

		<h1> Νέα Δημοπρασία </h1>
		<div id="logo">
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
      ID: <?php echo $_SESSION['producer_id'] ?? ' '; ?>
		</div>
</body>
</html>


<div id="content">

<form class="back_btn" action="<?php echo url_for('producers/index.php'); ?>">
  <input type="image" src="back.png" alt="Submit"  width="100" height="50">
</form>


  <div class="producer_new">
    <h2>Εισαγωγή νέας Δημοπρασίας</h2>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('producers/newaution.php'); ?>" method="post">
      <dl>
        <dt>Κωδικός προιόντος</dt>
        <dd><select name="code">
          <?php
            while ($product_set = mysqli_fetch_assoc($products_set)){
              $code =$product_set["code"];
              echo "<option>
                    $code
                    </option>";
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Σύντομη περιγραφή</dt>
        <dd><input type="text" name="description" value="<?php echo h($auction['description']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Ποσότητα σε κιλά</dt>
        <dd><input type="text" name="count" value="<?php echo h($auction['count']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Τιμή εκκίνησης</dt>
        <dd><input type="number" step="0.01" name="start_price" value="<?php echo h($auction['start_price']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Ημερομηνία Εκκινησεις</dt>
        <dd><input type="date" name="date_start" value="<?php echo date('Y-m-d');?>" /><br /></dd>
      </dl>
      <dl>
        <dt>'Ωρα Εκκινησεις</dt>
        <dd><input type="time" name="time_start" value="<?php echo date('H:i:s');?>" /></dd>
      </dl>
      <dl>
        <dt>Ημερομηνία Λήξης</dt>
        <dd><input type="date" name="date_end" value="<?php echo date('Y-m-d');?>" /><br /></dd>
      </dl>
      <dl>
        <dt>'Ωρα Λήξης</dt>
        <dd><input type="time" name="time_end" value="<?php echo date('H:i:s');?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Εισαγωγή Δημοπρασίας" />
      </div>
    </form>
    <br />
  </div>
  
    <div class="products">
	<dt>Για να δείτε τους κωδικόυς των τωρινών προιόντων κάντε κλικ εδώ.</dt>
	<form class="show_btn" action="<?php echo url_for('producers/show_products.php'); ?>">
			<input type="image" src="show.png" alt="Submit"  width="80" height="40">
    </form>	
	</div>

</div>
	<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
</html>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>