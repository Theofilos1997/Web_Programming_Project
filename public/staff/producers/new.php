<?php

require_once('../../../private/initialize.php');
  require_login();
$producer_set = find_all_producers();
$producer_count = mysqli_num_rows($producer_set) + 1;
mysqli_free_result($producer_set);

if(is_post_request()) {

  $producer = [];
  $producer['last_name'] = $_POST['last_name'] ?? ' ';
  $producer['first_name'] = $_POST['first_name'] ?? ' ';
  $producer['username'] = $_POST['username'] ?? ' ';
  $producer['password'] = $_POST['password'] ?? ' ';
  $producer['address'] = $_POST['address'] ?? ' ';
  $producer['phone'] = $_POST['phone'] ?? ' ';
  $producer['email'] = $_POST['email'] ?? ' ';
  $producer['confirm_password'] = $_POST['confirm_password'] ?? ' ';


  $result = insert_producer($producer);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The producer was created successfully';
    redirect_to(url_for('/staff/producers/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $producer = [];
  $producer['last_name'] = ' ';
  $producer['first_name'] = ' ';
  $producer['username'] = ' ';
  $producer['password'] = ' ';
  $producer['address'] = ' ';
  $producer['phone'] = ' ';
  $producer['email'] = ' ';
  $producer['confirm_password'] =  ' ';
}

?>

<?php $page_title = 'Create Producer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/producers/index.php'); ?>">&laquo; Back to List</a>

  <div class="producer new">
    <h1>Create Producer</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/producers/new.php'); ?>" method="post">
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($producer['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($producer['first_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($producer['username']); ?>" /></dd>
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
        <dd><input type="text" name="address" value="<?php echo h($producer['address']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><input type="text" name="phone" value="<?php echo h($producer['phone']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($producer['email']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Producer" />
      </div>
    </form>
    <br />
    <p>
      Passwords should be at least 4 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
    </p>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
