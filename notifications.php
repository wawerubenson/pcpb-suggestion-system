
<?php include "config/db.php";
$current_page = "notifications";

if (!isset($_SESSION['user-id'])) {
  header('Location: signin.php');
  die();
}

include "header.php";

?>

<!-- Page Header Start -- home page -->
<div class="container-fluid page-header-home mb-2">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-2" style="min-height: 50px">
            <p>
              ALL NOTIFICATIONS
            </p>
        </div>
    </div>
<!-- Page Header End -->

<?php

$current_user = $_SESSION['user-id'];
$select_sms = "SELECT * FROM replies WHERE user_id = $current_user";
$sms_res = mysqli_query($dbconnection,$select_sms);

$user = "SELECT * FROM users WHERE id = $current_user LIMIT 1";
$user_ress = mysqli_query($dbconnection,$user);
$user_details = mysqli_fetch_assoc($user_ress);
?>

<div class="container-fluid">
    <div class="row">
       <div class="col-md-12 my-4 d-flex">
        <?php while($sms = mysqli_fetch_assoc($sms_res)) : ?>
       <div class="col-md-3 message-body my-3 mx-2">
            <p>Hello <?= $user_details['first_name'] ?> your suggestion for <?= $sms['department'] ?> department was replied</p> 
            <p>The reply is "<?= $sms['reply'] ?>"</p>
        </div>
        <?php endwhile ?>

       </div>
    </div>
</div>



<?php include "footer.php"; ?>