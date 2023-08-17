

<?php
// include "config/db.php";
$current_page = "admins registration";
include "header.php";

$first_name = $_SESSION['register-data']['fname'] ?? null;
$last_name = $_SESSION['register-data']['lname'] ?? null;
$email = $_SESSION['register-data']['email'] ?? null;
$password = $_SESSION['register-data']['password'] ?? null;
$cpassword = $_SESSION['register-data']['cpassword'] ?? null;

unset($_SESSION['register-data']);

?>

<!-- Page Header Start -- home page -->
     <div class="container-fluid page-header-home mb-2">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-2" style="min-height: 50px">
            <p>
              ADMINS REGISTRATION
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

            <form method="post" action="admins-register-script.php" enctype="multipart/form-data" style="font-size: 14px;">
            <?php
               if(isset($_SESSION['register'])): ?>
                <div class="alert__message error">
                <p> <?= $_SESSION['register']; 
                unset($_SESSION['register']);
                ?> </p>
                </div>
                <?php endif ?>   

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example1cg">First Name</label>
                <input style="font-size: 14px;"  value = "<?= $first_name ?>" placeholder="Enter first name" required type="text" id="form3Example1cg" name="fname" class="form-control form-control-lg" />
                
              </div>

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3cg">Last Name:</label>
                <input style="font-size: 14px;" placeholder="Enter last name" required type="text" id="form3Example3cg" value = "<?= $last_name ?>" name="lname" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3cg">Admin code:</label>
                <input style="font-size: 14px;" placeholder="Enter your admin code" required type="text" id="form3Example3cg"  name="admin_code" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3cg">Email:</label>
                <input style="font-size: 14px;" value = "<?= $email ?>" required type="email" id="form3Example3cg" placeholder="Enter email address" name="email" class="form-control form-control-lg" />
              </div>


                <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3cg">Password:</label>
                <input value = "<?= $password ?>" required type="password" id="form3Example3cg" name="password" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3cg">Repeat Password:</label>
                <input value = "<?= $cpassword ?>" required type="password" id="form3Example3cg" name="cpassword" class="form-control form-control-lg" />
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" name="register_admin" class="btn btn-success">REGISTER</button>
              </div>

              <p class="text-center text-muted mt-5 mb-0">Have an account? <a href="#!"
                  class="fw-bold text-body"><u><a href="admins-login.php">Login here</a></u></a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>




<?php include "footer.php" ?>