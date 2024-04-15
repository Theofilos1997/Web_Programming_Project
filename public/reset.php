<?php require_once('../private/initialize.php'); ?>

<!DOCTYPE html>
<html>
<body background="<?php echo url_for('/images/eksofylo2.jpg'); ?>">
<head>
<title>reset</title>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('/stylesheets/main.css'); ?>" />
</head>

<form action="/action_page_for_reset.php" >
  <div class="container2">
    <h1>Επαναφορά password/username</h1>
    <p>Εισάγεται το email σας και θα σας αποστείλουμε mail με οδηγίες επαναφοράς του κωδικού σας γνωστποιώντας σας και το τρέχον username.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Εισάγεται το email σας" name="email" required>
    <div class="clearfix">
      <button type="submit" class="cancelbtn">Επαναφορά</button>
    </div>
  </div>
</form>

</body>
