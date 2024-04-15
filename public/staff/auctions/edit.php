<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/auctions/index.php'));
}
$id = $_GET['id'];

$producers_set = find_all_producers();
$products_set = find_all_products();

if(is_post_request()) {
  $auction = [];
  $auction['id'] = $id;
  $auction['id_pro'] = $_POST['id_pro'] ?? '';
  $auction['code'] = $_POST['code'] ?? '';
  $auction['count'] = $_POST['count'] ?? '';
  $auction['description'] = $_POST['description'] ?? '';
  $auction['start_price'] = $_POST['start_price'] ?? '';
  $auction['date_start'] = $_POST['date_start'] ?? '';
  $auction['time_start'] = $_POST['time_start'] ?? '';
  $auction['date_end'] = $_POST['date_end'] ?? '';
  $auction['time_end'] = $_POST['time_end'] ?? '';
  $auction['active'] = $_POST['active'] ?? '';

  $result = update_auction($auction);
  if($result === true) {
    $_SESSION['message'] = 'Auction updated.';
  } else {
    $errors = $result;
  }
} else {
  $auction = find_auction_by_id($id);
}

?>

<?php $page_title = 'Edit Auction'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/auctions/index.php'); ?>">&laquo; Back to List</a>

  <div class="auction edit">
    <h1>Edit Auction</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/auctions/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>ID_Producer</dt>
        <dd><select name="id_pro">
          <?php
            while ($producer_set = mysqli_fetch_assoc($producers_set)){
              $id_pro =$producer_set["id"];
              echo "<option>
                    $id_pro
                    </option>";
            }
          ?>
          </select>
        </dd>
      </dl>

      <dl>
        <dt>Code</dt>
        <dd><select name="code">
          <?php
            while ($product_set = mysqli_fetch_assoc($products_set)){
              $code=$product_set["code"];
              echo "<option>
                    $code
                    </option>";
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Counr</dt>
        <dd><input type="text" name="count" value="<?php echo h($auction['count']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><input type="text" name="description" value="<?php echo h($auction['description']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Start_Price</dt>
        <dd><input type="text" name="start_price" value="<?php echo h($auction['start_price']); ?>" /><br /></dd>
      </dl>

      <dl>
        <dt>Start_Date</dt>
        <dd><input name="date_start" type="date" value="<?php echo h($auction['date_start']); ?>"></dd>
      </dl>

      <dl>
        <dt>Time_Start</dt>
        <dd><input type="time" name="time_start" value="<?php echo h($auction['time_start']); ?>" /></dd>
      </dl>
      <dl>
        <dt>End_Date</dt>
        <dd><input name="date_end" type="date" value="<?php echo h($auction['date_end']); ?>"></dd>
      </dl>
      <dl>
        <dt>End_Time</dt>
        <dd><input type="time" name="time_end" value="<?php echo h($auction['time_end']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Active</dt>
        <dd><input type="boolean" name="active" value="<?php echo h($auction['active']); ?>" /></dd>
      </dl>
      <br />

      <div id="operations">
        <input type="submit" value="Edit Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
