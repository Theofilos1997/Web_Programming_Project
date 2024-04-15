<?php require_once('../../private/initialize.php'); ?>


<?php    require_login(); ?>
<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Admins</a></li>
      <li><a href="<?php echo url_for('/staff/traders/index.php'); ?>">Τraders</a></li>
      <li><a href="<?php echo url_for('/staff/producers/index.php'); ?>">Producers</a></li>
      <li><a href="<?php echo url_for('/staff/auctions/index.php'); ?>">Auctions</a></li>
      <li><a href="<?php echo url_for('/staff/products/index.php'); ?>">Products</a></li>
      <li><a href="<?php echo url_for('/staff/offers/index.php'); ?>">Offers</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
