<?php

require_once('../../../private/initialize.php');

require_login();
$trader_set = find_all_traders();
$trader_count = mysqli_num_rows($trader_set) + 1;
mysqli_free_result($trader_set);

if(is_post_request()) {

  $trader = [];
  $trader['last_name'] = $_POST['last_name'] ?? ' ';
  $trader['first_name'] = $_POST['first_name'] ?? ' ';
  $trader['username'] = $_POST['username'] ?? ' ';
  $trader['password'] = $_POST['password'] ?? ' ';
  $trader['address'] = $_POST['address'] ?? ' ';
  $trader['phone'] = $_POST['phone'] ?? ' ';
  $trader['email'] = $_POST['email'] ?? ' ';
  $trader['confirm_password'] = $_POST['confirm_password'] ?? ' ';


  $result = insert_trader($trader);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The trader was created successfully';
    redirect_to(url_for('/staff/traders/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $trader = [];
  $trader['last_name'] = ' ';
  $trader['first_name'] = ' ';
  $trader['username'] = ' ';
  $trader['password'] = ' ';
  $trader['address'] = ' ';
  $trader['phone'] = ' ';
  $trader['email'] = ' ';
  $trader['confirm_password'] = ' ';
}

?>

<?php $page_title = 'Create Trader'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/traders/index.php'); ?>">&laquo; Back to List</a>

  <div class="Trader new">
    <h1>Create Trader</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/traders/new.php'); ?>" method="post">
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($trader['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($trader['first_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($trader['username']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>
      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><input type="text" name="address" value="<?php echo h($trader['address']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><input type="text" name="phone" value="<?php echo h($trader['phone']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($trader['email']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create trader" />
      </div>
    </form>
  </br>
    <p>
      Passwords should be at least 4 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
    </p>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
