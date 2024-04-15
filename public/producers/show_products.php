<?php
require_once('../../private/initialize.php');

require_login_producer();

$product_set = find_all_products();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		   <link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />

 		<title>Show_Products</title>
	</head>


		<div id="data">
		<br>
		<h1 class="a"> Διαθέσιμα Προιόντα </h1>
		<div id="logo">
      User: <?php echo $_SESSION['username_producer'] ?? ' '; ?>
      ID: <?php echo $_SESSION['producer_id'] ?? ' '; ?>
	  </div>
		</div>
</body>
</html>

<form class="back_btn" action="<?php echo url_for('/producers/newaution.php'); ?>">
  <input type="image" src="back.png" alt="Submit"  width="100" height="50">
</form>
<div id="content1">
  <table class="list">
    <tr class="menu">
      <th>Code</th>
      <th>Kind</th>
      <th>Description</th>
      <th>Payment</th>
    </tr>

  <?php while($product = mysqli_fetch_assoc($product_set)) { ?>
    <tr class="products1">
        <td><?php echo h($product['code']); ?></td>
        <td><?php echo h($product['kind']); ?></td>
        <td><?php echo h($product['description']); ?></td>
        <td class="pay"><?php echo h($product['payment']); ?></td>
     </tr>
  <?php } ?>
  </table>

  <?php mysqli_free_result($product_set); ?>

  </div>

  </div>
