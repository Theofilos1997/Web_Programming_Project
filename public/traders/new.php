<?php

require_once('../../private/initialize.php');
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
    redirect_to(url_for('/traders/show.php?id=' . $new_id));
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

<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">
<head>
  <style>
    .hidden {
      display:none;
    }
  </style>
  <script>
    function showHide(){
      var checkbox = document.getElementById("chk");
      var hiddeninputs = document.getElementsByClassName("hidden");

        for (var i=0; i !=hiddeninputs.length; i++){
          if(checkbox.checked){
            hiddeninputs[i].style.display = "inline";
          }
          else {
            hiddeninputs[i].style.display = "none";
          }
        }
    }
  </script>
<title>Περιοχή Εμπόρων</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/main.css'); ?>" />

</head>
<?php echo display_session_message(); ?>

<h2>Περιοχή Εμπόρων</h2>


<div id="content">


<form class="form_trader1" action="<?php echo url_for('/home.php'); ?>">
  <input type="image" src="home.png" alt="Submit"  width="100" height="100">
</form>
	  
<div class="form_trader">
<p>Συνδεθείτε στον Λογαριασμό σας</p>
<form action="<?php echo url_for('/traders/login.php'); ?>">
  <input type="image" src="login.png" alt="Submit"  width="100" height="48">
</form>
</div>
<br>
  <div class="Trader new">

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/traders/new.php'); ?>" method="post">
      <div class="form_trader">
	 <p>Δημιουργία λογαριασμού </p>
      <input type="checkbox" name="chkbox" id="chk" onclick="showHide()"/>
      <label for="chk">Κάντε κλικ εδώ για Δημιουργία καινούργιου λογαριασμού εμπόρου.</label>
	  <br><br>

	 <dl class="hidden">
	  
	   
        <dt><label class="hidden"> Όνομα </label></dt>
        <dd><input type="text" name="last_name" value="<?php echo h($trader['last_name']); ?>" class="hidden"/></dd>
      </dl>
      <dl class="hidden">
        <dt><label class="hidden"> Επώνυμο </label></dt>
        <dd><input type="text" name="first_name" value="<?php echo h($trader['first_name']); ?>" class="hidden" /></dd>
      </dl>
      <dl class="hidden">
        <dt><label class="hidden"> Username </label></dt>
        <dd><input type="text" name="username" value="<?php echo h($trader['username']); ?>" class="hidden" /></dd>
      </dl >
      <dl class="hidden">
        <dt><label class="hidden"> Password </label></dt>
        <dd><input type="password" name="password" value="" class="hidden"/></dd>
      </dl>
      <dl class="hidden">
        <dt><label class="hidden"> Επιβεβαίωση  Password </label></dt>
        <dd><input type="password" name="confirm_password" value="" class="hidden"/></dd>
      </dl >
      <dl class="hidden">
        <dt><label class="hidden"> Διεύθυνση </label></dt>
        <dd><input type="text" name="address" value="<?php echo h($trader['address']); ?>" class="hidden"/></dd>
      </dl >
      <dl class="hidden">
        <dt><label class="hidden"> Τηλέφωνο </label></dt>
        <dd><input type="text" name="phone" value="<?php echo h($trader['phone']); ?>" class="hidden"/></dd>
      </dl>
      <dl class="hidden">
        <dt><label class="hidden"> E-mail </label></dt>
        <dd><input type="text" name="email" value="<?php echo h($trader['email']); ?>" class="hidden"/></dd>
      </dl>
</div>
      <div id="operations" class="hidden">
        <input type="submit" value="Δημιουργία Εμπόρου" class="hidden"/>
      </div>
    </form>
  </br>
    <p class="hidden">
      Σημείωση: Το passwords πρέπει να περιέχει τουλάχιστον 4 χαρακτήρες (τουλάχιστον ένα κεφαλάιο γράμμα, πεζό γράμμα, σημείο στήξης, αριθμό).
    </p>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
