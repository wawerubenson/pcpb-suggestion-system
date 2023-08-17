
<?php
// include "config/db.php";

$current_page  = "suggestions history";
include "header.php";

if (!isset($_SESSION['user-id'])) {
    header('Location: signin.php');
    die();
}

?>

<!-- Page Header Start -- home page -->
<div class="container-fluid page-header-home mb-2">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-2" style="min-height: 80px">
            <p class="fw-bold">
              VIEW ALL YOUR PREVIOUS SUGGESTIONS/COMPLAINTS. <br> 
            </p>
            <h6>Add another suggestion <a href="index.php"> <div class="btn btn-success">HERE</div> </a></h6>
        </div>
    </div>
<!-- Page Header End -->

<?php
$current_user = $_SESSION['user-id'];
$select_query = "SELECT * FROM suggestions WHERE user_id = $current_user";
$select_query_ress = mysqli_query($dbconnection,$select_query);


?>
<?php if(mysqli_num_rows($select_query_ress) > 0) : ?>
<div class="table-responsive container-fluid">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <!-- <th scope="col">Username</th> -->
        <th scope="col">Department</th>
        <th>Decsription</th>
        <th>Edit</th>
        <th>Delete</th>
        
      </tr>
    </thead>
    <tbody class="table-body">

    <?php if(isset($_SESSION['suggestion-success'])) : ?>
        <small style="color:green;font-size: 13px;">
            <?= $_SESSION['suggestion-success'] ?>
            <?php unset($_SESSION['suggestion-success']) ?>
        </small>
        <?php elseif(isset($_SESSION['edit-suggestion-success'])) : ?>
          <small style="color:green;font-size: 13px;">
            <?= $_SESSION['edit-suggestion-success'] ?>
            <?php unset($_SESSION['edit-suggestion-success']) ?>
        </small>
        <?php elseif(isset($_SESSION['delete-suggestion-success'])) : ?>
          <small style="color:red;font-size: 13px;">
            <?= $_SESSION['delete-suggestion-success'] ?>
            <?php unset($_SESSION['delete-suggestion-success']) ?>
        </small>
    <?php endif ?>

    <?php while($suggestion = mysqli_fetch_assoc($select_query_ress)) : ?>
      <tr>
        <th scope="row"><?= $suggestion['id'] ?></th>
        
        <td><?= $suggestion['department'] ?></td>
        <td><?= $suggestion['description'] ?></td>
        <td><button class="btn btn-success"><a class="text-black" href="edit-suggestion.php?id=<?= $suggestion['id'] ?>">edit</a></button></td>
        <td><button class="btn btn-danger"><a class="text-black" href="delete-suggestion.php?id=<?= $suggestion['id'] ?>">delete</a></button></td>
      </tr>

      <?php endwhile ?>



    </tbody>
  </table>
</div>

<?php else : ?>

  <div class="my-5">
  <p style="color:green;" class="pl-5 fw-bold display-5" >No suggestions for this user.</p>
  </div>
    

<?php endif ?>

<?php include "footer.php" ?>