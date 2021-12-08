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
                    <li class="breadcrumb-item"> add pig </li>
                </ul>
            </nav>
            <!-- End BreadCrumb -->

            <!-- title -->
            <div class="justify-content-between align-items-center pt-1 pb-2 mb-3 border-bottom mx-2">
                <h5 class="h5 mt-3 mb-0 color-darkgray"> Add pig <small></small></h5>
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
                                    $owner_id = cleanData($_POST['owner_id']);
                                    $nurture_batch_name = cleanData($_POST['nurture_batch_name']);
                                    $no_of_pig = cleanData($_POST['no_of_pig']);
                                    $amount_per_pig = cleanData($_POST['amount_per_pig']);
                                    $date_buy = cleanData($_POST['date_buy']);
                                    
                                    // save
                                    if($db->add_pig($owner_id, $nurture_batch_name, $no_of_pig, $amount_per_pig, $date_buy)){
                                        // redirect function - from scheme/setting_functions.php
                                        redirect('pigList_view');
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


                        <!-- col -->
                        <div class="col-md-12 float-sm-start">

                            <div class="col-md-6 p-2 float-sm-start">
                                <div class="card">
                                    <div class="card-header" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSchoolInfo" aria-expanded="true"
                                        aria-controls="collapseSchoolInfo">
                                        <span class="card-icon"><i class="fa fa-users"></i></span>
                                        Pig Information<i class="fa fa-caret-down pull-right"></i>
                                    </div>
                                    <div class="card-body accordion-collapse collapse show"
                                        id="collapseSchoolInfo-disable">

                                        <!-- HIDDEN input for CSRF Protection -->
                                        <input type="hidden" name="token" value="<?php echo CSRFToken(); ?>">

                                        <div class="col-md-12 mb-2">
                                            <label for="owner_id" class="form-label">Owner*</label>
                                            <select class="form-control form-control-sm" name="owner_id" id="owner_id"
                                                data-toggle="tooltip" data-placement="right" title="Owner" required>

                                                <!-- serve as placeholder -->
                                                <option value="" disabled selected>-- Choose Owner --</option>

                                                <?php 
                                                    // we can also reuse the function used in owners page table (we will use it to display in combobox)
                                                    $owners = $db->view_owners(); 
                                                    foreach($owners as $owner)
                                                    {
                                                        // use security for viewing records from your database using our Sanitize() methods
                                                        // or use directly the php built-in function htmlspecialchars($owner[full_name], ENT_QUOTES, 'UTF-8');
                                            
                                                ?>

                                                <option value="<?php echo $owner['owner_id']; ?>">
                                                    <?php echo Sanitize($owner['full_name']); ?></option>

                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="nurture_batch_name" class="form-label">Batch Name*</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nurture_batch_name" id="nurture_batch_name" placeholder=""
                                                data-toggle="tooltip" data-placement="right" title="Batch" required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="no_of_pig" class="form-label">No. of pig *</label>
                                            <input type="number" class="form-control form-control-sm" name="no_of_pig"
                                                id="no_of_pig" placeholder="" data-toggle="tooltip"
                                                data-placement="right" title="No. of pig" required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="amount_per_pig" class="form-label">Amount per pig *</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="amount_per_pig" id="amount_per_pig" placeholder=""
                                                data-toggle="tooltip" data-placement="right" title="Amount per pig"
                                                required>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="date_buy" class="form-label">Date Buy *</label>
                                            <input type="date" class="form-control form-control-sm" name="date_buy"
                                                id="date_buy" placeholder="" data-toggle="tooltip"
                                                data-placement="right" title="Date Buy" required>
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