<?php

require_once('../../private/initialize.php');
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


  $result = insert_producter($producer);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The producer was created successfully';
    redirect_to(url_for('/producers/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
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
<title>Περιοχή Παραγωγών</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/main.css'); ?>" />

</head>
<?php echo display_session_message(); ?>

<h2>Περιοχή Παραγωγών</h2>


<div id="content">


<form class="form_trader1" action="<?php echo url_for('/home.php'); ?>">
  <input type="image" src="home.png" alt="Submit"  width="100" height="100">
</form>

<div class="form_trader">
<p>Συνδεθείτε στον Λογαριασμό σας</p>
<form action="<?php echo url_for('/producers/login.php'); ?>">
  <input type="image" src="login.png" alt="Submit"  width="100" height="48">
</form>
</div>
<br>
  <div class="producer new">

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/producers/new.php'); ?>" method="post">
	 <div class="form_trader">
	 <p>Δημιουργία λογαριασμού </p>
      <input type="checkbox" name="chkbox" id="chk" onclick="showHide()"/>
      <label for="chk">Κάντε κλικ εδώ για Δημιουργία καινούργιου λογαριασμού παραγωγού.</label>
	  <br><br>
      
	   <dl class="hidden">
        <dt>Όνομα</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($producer['last_name']); ?>" /></dd>
      </dl>
       <dl class="hidden">
        <dt>Επώνυμο</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($producer['first_name']); ?>" /></dd>
      </dl>
       <dl class="hidden">
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($producer['username']); ?>" /></dd>
      </dl>
       <dl class="hidden">
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>
       <dl class="hidden">
        <dt>Επιβεβαίωση Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
       <dl class="hidden">
        <dt>Διεύθυνση</dt>
        <dd><input type="text" name="address" value="<?php echo h($producer['address']); ?>" /></dd>
      </dl>
       <dl class="hidden">
        <dt>Τηλέφωνο</dt>
        <dd><input type="text" name="phone" value="<?php echo h($producer['phone']); ?>" /></dd>
      </dl>
       <dl class="hidden">
        <dt>E-mail</dt>
        <dd><input type="text" name="email" value="<?php echo h($producer['email']); ?>" /></dd>
      </dl>

</div>
      <div id="operations" class="hidden">
        <input type="submit" value="Δημιουργία Παραγωγού" />
      </div>
    </form>
    </br>
    <p class="hidden">
      Σημείωση: Το passwords πρέπει να περιέχει τουλάχιστον 4 χαρακτήρες (τουλάχιστον ένα κεφαλάιο γράμμα, πεζό γράμμα, σημείο στήξης, αριθμό).
    </p>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
