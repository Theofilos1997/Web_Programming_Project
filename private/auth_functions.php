<?php

  function log_in_admin($admin) {
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
  }

  function log_in_trader($trader) {
    session_regenerate_id();
    $_SESSION['trader_id'] = $trader['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username_trader'] = $trader['username'];
    return true;
  }

  function log_in_producer($producer) {
    session_regenerate_id();
    $_SESSION['producer_id'] = $producer['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username_producer'] = $producer['username'];
    return true;
  }

  function log_out_admin() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    return true;
  }
  function log_out_trader() {
    unset($_SESSION['trader_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username_trader']);
    return true;
  }
  function log_out_producer() {
    unset($_SESSION['producer_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username_producer']);
    return true;
  }

function is_logged_in() {
  return isset($_SESSION['admin_id']);
}

function is_logged_in_trader() {

    return isset($_SESSION['trader_id']);
  }

  function is_logged_in_producer() {

      return isset($_SESSION['producer_id']);
    }
	
function require_login() {
  if(!is_logged_in()) {
    redirect_to(url_for('/staff/login.php'));
  } else {

  }
}


function require_login_trader() {
  if(!is_logged_in_trader()) {
    redirect_to(url_for('/traders/login.php'));
  } else {

  }
}


function require_login_producer() {
  if(!is_logged_in_producer()) {
    redirect_to(url_for('/producers/login.php'));
  } else {

  }
}
?>
