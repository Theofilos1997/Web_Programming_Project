<?php require_once('../../../private/initialize.php'); ?>

<?php  require_login(); ?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$trader = find_trader_by_id($id);

?>

<?php $page_title = 'Show Trader'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/traders/index.php'); ?>">&laquo; Back to List</a>

  <div class="producer show">

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
