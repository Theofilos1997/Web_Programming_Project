<?php require_once('../../private/initialize.php'); ?>
<?php
$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  if(empty($errors)) {
    $login_failure_msg = "Log in was unsuccessful.";

    $producer = find_producer_by_username($username);
    if($producer) {

      if ($password === $producer['password']){
        log_in_producer($producer);
        redirect_to(url_for('/producers/index.php'));
      } else {
        $errors[] = $login_failure_msg;
      }

    } else {
      $errors[] = $login_failure_msg;
    }

  }

}

?>

<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">

<head>

<form class="form_trader1" action="<?php echo url_for('/home.php'); ?>">
  <input type="image" src="home.png" alt="Submit"  width="100" height="100">
</form>


<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  media="all" href="<?php echo url_for('/stylesheets/main.css'); ?>" />
	</head>
  <div class="user_welcome">Σύνδεση Παραγωγού</div>
  <?php echo display_session_message(); ?>
<section  class="content">
<form class="login" action="<?php echo url_for('/producers/login.php');?>" method = "post">
  <div class="avatarcontainer">

    <img src="<?php echo url_for('images/avatar.png');?>" alt="Avatar" class="avatar">

    <?php echo display_errors($errors); ?>

  </div>

  <div class="container1">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" >

    <button type="submit" >Login</button>
   </div>

  <div class="container1">
  <a href="<?php echo url_for('/reset.php');?>"><span class="psw">Forgot password/username</span></a>
  </div>

</form>
</section>


</body>
</html>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>