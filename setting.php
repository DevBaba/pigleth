<?php

require_once('scheme/core.php');

//create object of database/Model class
$db = new Model();

//session user validation
if (empty($_SESSION['username'])) {
    redirect('login');
}


?>

<?php
 require_once("includes/header.php");
?>

<!-- topbar -->
<?php
 require_once("includes/topbar.php");
?>
<!-- end topbar -->

<!-- Container - Fluid -->
<div class="container-fluid pt-5">
    <!-- Row -->
    <div class="row">

        <!-- sidebar -->
        <?php
        require_once("includes/sidebar.php");
        ?>
        <!-- end side bar -->

        <!-- Main -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2 bg-white maincontent">

            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" class="pt-3 mb-2 bg-white border-bottom mx-2">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="" class="breadcrumb-link"><i class="fa fa-dashboard"></i>
                            Dashboard</a></li>
                    <li class="breadcrumb-item"> settings </li>
                </ul>
            </nav>
            <!-- End BreadCrumb -->

            <!-- title -->
            <div class="justify-content-between align-items-center pt-1 pb-2 mb-3 border-bottom mx-2">
                <h5 class="h5 mt-3 mb-0 color-darkgray"> Change Settings <small></small></h5>
            </div>
            <!-- end title -->




            <!-- container-fluid -->
            <div class="container-fluid-xxl pb-2">
                <!-- COL 12 -->
                <div class="col-md-12 float-sm-start">

                    <div class="col-md-12 float-sm-start p-2">
                        <!-- Alert -->

                        <?php

                            if(isset($_POST['submit'])){

                                // check CSRF before save - for security purposes
                                if(CSRFProtect($_POST['token']))
                                {
                                    // apply security to your data using our cleanData() function (or use directly the trim() & stripslashes() php built-in functions)
                                    
                                    $password = cleanData($_POST['password']);
                                    $new_pass = cleanData($_POST['new_pass']);
                                    $confirm_pass = cleanData($_POST['confirm_pass']);
                                    
                                    // chech if equal
                                    if($new_pass == $confirm_pass)
                                    {
                                        // update in database
                                        if($db->user_settings($password, $new_pass)){
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <h4 class="alert-heading">Success!</h4>
                                                <p></p>
                                                <hr>
                                                <p class="mb-0"> Password Successfully Updated! </p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                        }else{
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <h4 class="alert-heading">Something went wrong!</h4>
                                                <p></p>
                                                <hr>
                                                <p class="mb-0"> There was an error in your transaction! </p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <h4 class="alert-heading">Something went wrong!</h4>
                                                <p></p>
                                                <hr>
                                                <p class="mb-0"> Password did not match! </p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                    }
                                    
                                }
                            }
                            
                        ?>


                    </div>

                    <!-- Form -->
                    <form action="" method="post" class="outer-form" autocomplete="off" id="validate">


                        <!-- col -->
                        <div class="col-md-12 float-sm-start">

                            <div class="col-md-6 p-2 float-sm-start">
                                <div class="card">
                                    <div class="card-header" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSchoolInfo" aria-expanded="true"
                                        aria-controls="collapseSchoolInfo">
                                        <span class="card-icon"><i class="fa fa-users"></i></span>
                                        User Information<i class="fa fa-caret-down pull-right"></i>
                                    </div>
                                    <div class="card-body accordion-collapse collapse show"
                                        id="collapseSchoolInfo-disable">

                                        <!-- HIDDEN input for CSRF Protection -->
                                        <input type="hidden" name="token" value="<?php echo CSRFToken(); ?>">

                                        <div class="col-md-12 mb-2">
                                            <label for="username" class="form-label">Userame*</label>
                                            <input type="text" class="form-control form-control-sm" name="username"
                                                id="username" placeholder="" data-toggle="tooltip"
                                                data-placement="right" title="Username"
                                                value="<?php echo $_SESSION['username']; ?>" required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-sm" name="password"
                                                id="password" placeholder="" data-toggle="tooltip"
                                                data-placement="right" title="Password" required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="new_pass" class="form-label">New Password</label>
                                            <input type="password" class="form-control form-control-sm" name="new_pass"
                                                id="new_pass" placeholder="" data-toggle="tooltip"
                                                data-placement="right" title="New Password" required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="confirm_pass" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control form-control-sm"
                                                name="confirm_pass" id="confirm_pass" placeholder=""
                                                data-toggle="tooltip" data-placement="right" title="Confirm Password"
                                                required>
                                        </div>


                                    </div>
                                    <!-- End Card Body -->
                                </div>
                                <!-- End card -->
                            </div>


                        </div>
                        <!-- end col- -->


                        <!-- Col- -->
                        <div class="col-md-12 p-2 float-sm-start pb-5">
                            <div class="card" style="border-bottom: none">
                                <div class="card-header" style="border: none">

                                    <input type="submit" id="submit" value="Submit" name="submit"
                                        class="btn btn-sm btn-success">

                                </div>
                                <!-- End Card Body -->
                            </div>
                            <!-- End card -->
                        </div>
                        <!-- end col- -->


                    </form>
                    <!-- End Form -->


                </div>
                <!-- END COL 12 -->
            </div>
            <!-- End container-fluid -->





            <!-- Footer -->
            <?php
            require_once("includes/footbar.php");
            ?>
            <!-- End Footer -->

        </main>
        <!-- End Main -->

    </div>
    <!-- End Row -->
</div>
<!-- End Container - Fluid -->

<?php
require_once("includes/footer.php");
?>