<?php

// include "config/db.php";
include "header.php";
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
// $count = mysqli_num_rows($select_ress);


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

<section class="vh-100 bg-image mt-4"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">

                        <div class="card-body p-5 pt-3">

                            <form method="post" action="edit-suggestion-script.php" enctype="multipart/form-data"
                                style="font-size: 14px;">
                                <input type="hidden" name="suggestion_id" value="<?= $select_results['id'] ?>">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Username</label>
                                    <input style="font-size: 14px;" readonly value="<?= $select_results['user_name'] ?>"
                                        type="text" id="form3Example1cg" name="user_name"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Category:</label>
                                    <select value="" required id="department-select" name="department">
                                        
                                        <option value="Academics">Suggestion</option>
                                        <option value="Finance">Complaint</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Description:</label>
                                    <textarea class="form-control form-control-lg" name="description" id="" value="" cols="30" rows="10"> <?= $select_results['description'] ?></textarea>
                                    
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="edit_suggestion" class="btn btn-success">EDIT
                                        SUGGESTION</button>
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