<?php
include "config/db.php";
$current_page = "admins page";

if (!isset($_SESSION['user-id'])) {
  header('Location: signin.php');
  die();
}
include "admin-header.php";
?>

<!-- Page Header Start -- home page -->
<div class="container-fluid page-header-home mb-2">
  <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-2" style="min-height: 80px">
    <p class="fw-bold">
      USERS' SUGGESTIONS
    </p>
  </div>
</div>
<!-- Page Header End -->

<?php

$current_user = $_SESSION['user-id'];
$users = "SELECT * FROM admins WHERE id = $current_user LIMIT 1";
$users_ress = mysqli_query($dbconnection, $users);
$user_details = mysqli_fetch_assoc($users_ress);

if ($user_details['is_admin'] == 1) {
  $select_query = "SELECT * FROM suggestions";
  $select_query_ress = mysqli_query($dbconnection, $select_query);
} 

?>
<?php if (mysqli_num_rows($select_query_ress) > 0): ?>
  <div class="table-responsive container-fluid">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Category</th>
          <th>Contents</th>
          <!-- <th>Edit</th> -->
          <th>Reply</th>

        </tr>
      </thead>
      <tbody class="table-body">

        <?php if (isset($_SESSION['suggestion-success'])): ?>
          <small style="color:green;font-size: 13px;">
            <?= $_SESSION['suggestion-success'] ?>
            <?php unset($_SESSION['suggestion-success']) ?>
          </small>
        <?php elseif (isset($_SESSION['edit-suggestion-success'])): ?>
          <small style="color:green;font-size: 13px;">
            <?= $_SESSION['edit-suggestion-success'] ?>
            <?php unset($_SESSION['edit-suggestion-success']) ?>
          </small>
        <?php elseif (isset($_SESSION['delete-suggestion-success'])): ?>
          <small style="color:red;font-size: 13px;">
            <?= $_SESSION['delete-suggestion-success'] ?>
            <?php unset($_SESSION['delete-suggestion-success']) ?>
          </small>
          <?php elseif (isset($_SESSION['reply-success'])): ?>
          <small style="color:green;font-size: 13px;">
            <?= $_SESSION['reply-success'] ?>
            <?php unset($_SESSION['reply-success']) ?>
          </small>
        <?php endif ?>

        <?php while ($suggestion = mysqli_fetch_assoc($select_query_ress)): ?>
          <tr>
            <th scope="row">
              <?= $suggestion['id'] ?>
            </th>
            <td>
              <?= $suggestion['user_name'] ?>
            </td>
            <td>
              <?= $suggestion['department'] ?>
            </td>
            <td>
              <?= $suggestion['description'] ?>
            </td>
            <?php $sugg_id = $suggestion['id'];
            $select = "SELECT * FROM replies WHERE sugg_id = $sugg_id";
            $select_ress = mysqli_query($dbconnection,$select);
            ?>
            <?php if(mysqli_num_rows($select_ress) > 0) : ?>
              <td> <button class="btn btn-success">replied</button> </td>
              <?php else : ?>
            <td><button class="btn btn-danger"><a class="text-black"
                  href="reply.php?id=<?= $suggestion['id'] ?>">reply</a></button></td>
                  <?php endif ?>
          </tr>

        <?php endwhile ?>
      </tbody>
    </table>
  </div>

<?php else: ?>
  <p>No suggestions yet. Keep checking</p>

<?php endif ?>

<?php include "footer.php" ?>