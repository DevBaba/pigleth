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
                    <li class="breadcrumb-item"> add owner </li>
                </ul>
            </nav>
            <!-- End BreadCrumb -->

            <!-- title -->
            <div class="justify-content-between align-items-center pt-1 pb-2 mb-3 border-bottom mx-2">
                <h5 class="h5 mt-3 mb-0 color-darkgray"> Add Owner <small></small></h5>
            </div>
            <!-- end title -->




            <!-- container-fluid -->
            <div class="container-fluid-xxl pb-2">
                <!-- COL 12 -->
                <div class="col-md-12 float-sm-start">

                    <div class="col-md-12 float-sm-start p-2">
                        <!-- Alert -->

                        <?php
                            // update info
                            if(isset($_POST['update'])){

                                // check CSRF before save - for security purposes
                                if(CSRFProtect($_POST['token']))
                                {
                                    // apply security to your data using our cleanData() function (or use directly the trim() & stripslashes() php built-in functions)
                                    $full_name = cleanData($_POST['full_name']);
                                    $contact = cleanData($_POST['contact']);
                                    $address = cleanData($_POST['address']);
                                    
                                    // save 
                                    // get id from url using $_GET global variable (eg: $_GET['id']), then add to your argument, this will use to identify what data you want to update in your query
                                    if($db->update_owner($_GET['id'], $full_name, $contact, $address)){
                                        // redirect function - from scheme/setting_functions.php
                                        redirect('ownerList_view');
                                    }else{
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <h4 class="alert-heading">Something went wrong!</h4>
                                            <p></p>
                                            <hr>
                                            <p class="mb-0"> There was an error in your transaction! </p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                    }
                                }
                            }
                            
                        ?>


                    </div>

                    <!-- Form -->
                    <form action="" method="post" class="outer-form" autocomplete="off" id="validate">

                        <?php
                            // get info
                            // get id from url using $_GET global variable (eg: $_GET['id'])

                            // check if have id in URL or if id has value, this is for security purposes if anyone modify your url
                            if(!isset($_GET['id']) || $_GET['id'] == '')
                            {
                                // if not, then no data to edit, back to your list without updates/ this will prevent error in your edit page
                                redirect('ownerList_view');
                            }
                            
                            $data = $db->get_owner_by_id($_GET['id']);
                        ?>

                        <!-- col -->
                        <div class="col-md-12 float-sm-start">

                            <div class="col-md-6 p-2 float-sm-start">
                                <div class="card">
                                    <div class="card-header" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSchoolInfo" aria-expanded="true"
                                        aria-controls="collapseSchoolInfo">
                                        <span class="card-icon"><i class="fa fa-users"></i></span>
                                        Owner Information<i class="fa fa-caret-down pull-right"></i>
                                    </div>
                                    <div class="card-body accordion-collapse collapse show"
                                        id="collapseSchoolInfo-disable">

                                        <!-- HIDDEN input for CSRF Protection -->
                                        <input type="hidden" name="token" value="<?php echo CSRFToken(); ?>">

                                        <div class="col-md-12 mb-2">
                                            <label for="name" class="form-label">Full Name*</label>
                                            <input type="text" class="form-control form-control-sm" name="full_name"
                                                id="name" placeholder="" data-toggle="tooltip" data-placement="right"
                                                title="Full Name" value="<?php echo $data['full_name']; ?>" required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="contact" class="form-label">Contact</label>
                                            <input type="text" class="form-control form-control-sm" name="contact"
                                                id="contact" placeholder="" data-toggle="tooltip" data-placement="right"
                                                title="Contact" value="<?php echo $data['contact']; ?>">
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control form-control-sm" name="address"
                                                id="address" placeholder="" data-toggle="tooltip" data-placement="right"
                                                title="Address" value="<?php echo $data['address']; ?>">
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

                                    <input type="submit" id="update" value="Update" name="update"
                                        class="btn btn-sm btn-warning">

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