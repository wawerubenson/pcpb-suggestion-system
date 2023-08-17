<?php

include "config/db.php";
$current_page = "Send reply";
if (!isset($_SESSION['user-id'])) {
    header('Location: signin.php');
    die();
}
if (!isset($_GET['id'])) {
    header('Location: index.php');
    die();
}
$current_id = $_GET['id'];
$select = "SELECT * FROM suggestions WHERE id = $current_id LIMIT 1";
$select_ress = mysqli_query($dbconnection, $select);
$select_results = mysqli_fetch_assoc($select_ress);
$current_user = $_SESSION['user-id'];
$current_user = "SELECT * FROM users WHERE id = $current_user LIMIT 1";
$current_user_ress = mysqli_query($dbconnection,$current_user);
$user_ress = mysqli_fetch_assoc($current_user_ress);
// $count = mysqli_num_rows($select_ress);

include "admin-header.php";
?>

<!-- Page Header Start -- home page -->
<div class="container-fluid page-header-home mb-2">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-2" style="min-height: 50px">
        <p>
            EDIT YOUR PREVIOUS SUGGESTION
        </p>
    </div>
</div>
<!-- Page Header End -->

<section class="vh-100 bg-image mt-4" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">

                        <div class="card-body p-5 pt-3">

                            <form method="post" action="reply-logic.php" enctype="multipart/form-data" style="font-size: 14px;">

                                <input type="hidden" name="suggestion_id" value="<?= $select_results['id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $select_results['user_id'] ?>">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Username <?= $select_results['user_name'] ?></label>
                                    <input style="font-size: 14px;" readonly value="<?= $select_results['user_name'] ?>" type="text" id="form3Example1cg" name="user_name" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Department</label>
                                    <input style="font-size: 14px;" readonly value="<?= $select_results['department'] ?>" type="text" id="form3Example1cg" name="department" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Description</label>
                                    <input style="font-size: 14px;" readonly value="<?= $select_results['description'] ?>" type="text" id="form3Example1cg" name="description" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Admin Name</label>
                                    <input style="font-size: 14px;" readonly value="<?= $user_ress['first_name'] ?>" type="text" id="form3Example1cg" name="user_name" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Reply</label>

                                    <textarea placeholder="type reply here..." style="font-size: 14px;"  id="form3Example1cg" class="form-control form-control-lg" name="reply" id="" cols="30" rows="10">

                                    </textarea>
                                    
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="send_reply" class="btn btn-success">send reply</button>
                                </div>
                               
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>











<?php //include "footer.php"; ?>