<?php

  // producers
  function find_all_producers() {
    global $db;

    $sql = "SELECT * FROM producers ";
    $sql .= "ORDER BY id ASC";
   
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_producer_by_id($id) {
    global $db;

    $sql = "SELECT * FROM producers ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; 
  }

  function validate_producer($producer) {

    $errors = [];

    if(is_blank($producer['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif(!has_length($producer['last_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($producer['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif(!has_length($producer['first_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }
	
    if(is_blank($producer['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif(!has_length($producer['username'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Username  must be between 2 and 255 characters.";
    }

    if(is_blank($producer['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($producer['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($producer['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($producer['password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($producer['password'], array('min' => 4))) {
      $errors[] = "Password must contain 4 or more characters";
    } elseif (!preg_match('/[A-Z]/', $producer['password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $producer['password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $producer['password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $producer['password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($producer['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($producer['password'] !== $producer['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }

    if(is_blank($producer['address'])) {
      $errors[] = "Address cannot be blank.";
    } elseif(!has_length($producer['address'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Address  must be between 2 and 255 characters.";
    }

    if(!has_unique_producer_username($producer['username'])) {
     $errors[] = "Username must be unique.";
    }

    return $errors;
  }

  function insert_producer($producer) {
    global $db;

    $errors = validate_producer($producer);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO producers ";
    $sql .= "(last_name, first_name, username, password, address, phone, email) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $producer['last_name']) . "',";
    $sql .= "'" . db_escape($db, $producer['first_name']) . "',";
    $sql .= "'" . db_escape($db, $producer['username']) . "',";
    $sql .= "'" . db_escape($db, $producer['password']) . "',";
    $sql .= "'" . db_escape($db, $producer['address']) . "',";
    $sql .= "'" . db_escape($db, $producer['phone']) . "',";
    $sql .= "'" . db_escape($db, $producer['email']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_producer($id) {
    global $db;

    $sql = "DELETE FROM producers ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  
  
  // trader
  function find_all_traders() {
    global $db;

    $sql = "SELECT * FROM traders ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_trader_by_id($id) {
    global $db;

    $sql = "SELECT * FROM traders ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $trader = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $trader;
  }

  function validate_trader($trader) {
    $errors = [];

    if(is_blank($trader['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif(!has_length($trader['last_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($trader['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif(!has_length($trader['first_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }
 
    if(is_blank($trader['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif(!has_length($trader['username'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Username  must be between 2 and 255 characters.";
    }
 
    if(is_blank($trader['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($trader['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($trader['email'])) {
      $errors[] = "Email must be a valid format.";
    }

 
    if(is_blank($trader['password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($trader['password'], array('min' => 4))) {
      $errors[] = "Password must contain 4 or more characters";
    } elseif (!preg_match('/[A-Z]/', $trader['password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $trader['password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $trader['password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $trader['password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($trader['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($trader['password'] !== $trader['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }

    if(is_blank($trader['address'])) {
      $errors[] = "Address cannot be blank.";
    } elseif(!has_length($trader['address'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Address  must be between 2 and 255 characters.";
    }

    if(!has_unique_producer_username($trader['username'])) {
     $errors[] = "Username must be unique.";
    }

    return $errors;
  }

  function insert_trader($trader) {
    global $db;

    $errors = validate_trader($trader);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO traders ";
    $sql .= "(last_name, first_name, username, password, address, phone, email) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $trader['last_name']) . "',";
    $sql .= "'" . db_escape($db, $trader['first_name']) . "',";
    $sql .= "'" . db_escape($db, $trader['username']) . "',";
    $sql .= "'" . db_escape($db, $trader['password']) . "',";
    $sql .= "'" . db_escape($db, $trader['address']) . "',";
    $sql .= "'" . db_escape($db, $trader['phone']) . "',";
    $sql .= "'" . db_escape($db, $trader['email']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }




  function delete_trader($id) {
    global $db;

    $sql = "DELETE FROM traders ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  
  // Admins
    function find_all_admins() {
      global $db;

      $sql = "SELECT * FROM admins ";
      $sql .= "ORDER BY last_name ASC, first_name ASC";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function find_admin_by_id($id) {
      global $db;

      $sql = "SELECT * FROM admins ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $admin = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $admin;
    }

    function find_admin_by_username($username) {
      global $db;

      $sql = "SELECT * FROM admins ";
      $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $admin = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $admin;
    }

    function validate_admin($admin) {

      if(is_blank($admin['first_name'])) {
        $errors[] = "First name cannot be blank.";
      } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "First name must be between 2 and 255 characters.";
      }

      if(is_blank($admin['last_name'])) {
        $errors[] = "Last name cannot be blank.";
      } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "Last name must be between 2 and 255 characters.";
      }

      if(is_blank($admin['email'])) {
        $errors[] = "Email cannot be blank.";
      } elseif (!has_length($admin['email'], array('max' => 255))) {
        $errors[] = "Last name must be less than 255 characters.";
      } elseif (!has_valid_email_format($admin['email'])) {
        $errors[] = "Email must be a valid format.";
      }

      if(is_blank($admin['username'])) {
        $errors[] = "Username cannot be blank.";
      } elseif (!has_length($admin['username'], array('min' => 5, 'max' => 255))) {
        $errors[] = "Username must be between 5 and 255 characters.";
      } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
      }

      if(is_blank($admin['password'])) {
        $errors[] = "Password cannot be blank.";
      } elseif (!has_length($admin['password'], array('min' => 4))) {
        $errors[] = "Password must contain 4 or more characters";
      } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($admin['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } elseif ($admin['password'] !== $admin['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }

      return $errors;
    }

    function insert_admin($admin) {
      global $db;

      $errors = validate_admin($admin);
      if (!empty($errors)) {
        return $errors;
      }

      $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

      $sql = "INSERT INTO admins ";
      $sql .= "(first_name, last_name, email, username, hashed_password) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
      $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
      $sql .= "'" . db_escape($db, $admin['email']) . "',";
      $sql .= "'" . db_escape($db, $admin['username']) . "',";
      $sql .= "'" . db_escape($db, $hashed_password) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function update_admin($admin) {
      global $db;

      $errors = validate_admin($admin);
      if (!empty($errors)) {
        return $errors;
      }

      $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

      $sql = "UPDATE admins SET ";
      $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
      $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
      $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
      $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
      $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
      $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function delete_admin($admin) {
      global $db;

      $sql = "DELETE FROM admins ";
      $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
      $sql .= "LIMIT 1;";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function find_trader_by_username($username) {
      global $db;

      $sql = "SELECT * FROM traders ";
      $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $trader = mysqli_fetch_assoc($result); 
      mysqli_free_result($result);
      return $trader;
    }

    function find_producer_by_username($username) {
      global $db;

      $sql = "SELECT * FROM producers ";
      $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $producer = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $producer;
    }

    function find_all_auctions() {
      global $db;

      $sql = "SELECT * FROM auctions ";
      $sql .= "ORDER BY id ASC";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function find_auction_by_id($id) {
      global $db;

      $sql = "SELECT * FROM auctions ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $auction = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $auction;
    }

    function find_auction_by_pro_id($id) {
      global $db;

      $sql = "SELECT * FROM auctions ";
      $sql .= "WHERE id_pro='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function update_auction($auction) {
      global $db;

      $sql = "UPDATE auctions SET ";
      $sql .= "id_pro='" . db_escape($db, $auction['id_pro']) . "', ";
      $sql .= "code='" . db_escape($db, $auction['code']) . "', ";
      $sql .= "description='" . db_escape($db, $auction['description']) . "', ";
      $sql .= "start_price='" . db_escape($db, $auction['start_price']) . "',";
      $sql .= "date_start='" . db_escape($db, $auction['date_start']) . "', ";
      $sql .= "time_start='" . db_escape($db, $auction['time_start']) . "', ";
      $sql .= "date_end='" . db_escape($db, $auction['date_end']) . "', ";
      $sql .= "time_end='" . db_escape($db, $auction['time_end']) . "', ";
      $sql .= "active='" . db_escape($db, $auction['active']) . "' ";
      $sql .= "WHERE id='" . db_escape($db, $auction['id']) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }


    function delete_auction($id) {
      global $db;

      $sql = "DELETE FROM auctions ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function find_all_products() {
      global $db;

      $sql = "SELECT * FROM products ";
      $sql .= "ORDER BY code ASC";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function find_product_by_id($id) {
      global $db;

      $sql = "SELECT * FROM products ";
      $sql .= "WHERE code='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $product = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $product;
    }

    function delete_product($code) {
      global $db;

      $sql = "DELETE FROM products ";
      $sql .= "WHERE code='" . db_escape($db, $code) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function insert_product($product) {
      global $db;


      $sql = "INSERT INTO products ";
      $sql .= "(code, kind, description, payment) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $product['code']) . "',";
      $sql .= "'" . db_escape($db, $product['kind']) . "',";
      $sql .= "'" . db_escape($db, $product['description']) . "',";
      $sql .= "'" . db_escape($db, $product['payment']) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function find_all_offers() {
      global $db;

      $sql = "SELECT * FROM offers ";
      $sql .= "ORDER BY code_auction and code_trader ASC";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function find_offer_by_id($id) {
      global $db;

      $sql = "SELECT * FROM offers ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $offer = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $offer;
    }

    function find_offers_by_tr_id($id) {
      global $db;

      $sql = "SELECT * FROM offers ";
      $sql .= "WHERE code_trader='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
    }

    function delete_offer($id) {
      global $db;

      $sql = "DELETE FROM offers ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function insert_offer($offer) {
      global $db;

      $errors = [];
      $errors = validate_offer($offer);

      if(!empty($errors)) {
        return $errors;
      }

      $sql = "INSERT INTO offers ";
      $sql .= "(code_auction, code_trader, price_offer, date, time) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $offer['code_auction']) . "',";
      $sql .= "'" . db_escape($db, $offer['code_trader']) . "',";
      $sql .= "'" . db_escape($db, $offer['price_offer']) . "',";
      $sql .= "'" . db_escape($db, $offer['date']) . "',";
      $sql .= "'" . db_escape($db, $offer['time']) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function validate_offer($offer){
      $errors=[];

      if(is_blank($offer['price_offer'])){
        $errors[] = "Price offer  cant be blank";
      }
      return $errors;
    }

    function validate_auction($auction){
      $errors=[];

      if(is_blank($auction['start_price'])){
        $errors[] = "Start Price cant be blank";
      }elseif(is_blank($auction['count'])){
        $errors[] = "Count cant be blank";
      }
      return $errors;
    }

    function insert_auction($auction) {
      global $db;

      $errors = [];
      $errors = validate_auction($auction);

      if(!empty($errors)) {
        return $errors;
      }

      $sql = "INSERT INTO auctions ";
      $sql .= "(id_pro, code, count, description, start_price, date_start, time_start, date_end, time_end) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $auction['id_pro']) . "',";
      $sql .= "'" . db_escape($db, $auction['code']) . "',";
      $sql .= "'" . db_escape($db, $auction['count']) . "',";
      $sql .= "'" . db_escape($db, $auction['description']) . "',";
      $sql .= "'" . db_escape($db, $auction['start_price']) . "',";
      $sql .= "'" . db_escape($db, $auction['date_start']) . "',";
      $sql .= "'" . db_escape($db, $auction['time_start']) . "',";
      $sql .= "'" . db_escape($db, $auction['date_end']) . "',";
      $sql .= "'" . db_escape($db, $auction['time_end']) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }
  ?>
