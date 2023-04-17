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
                    <li class="breadcrumb-item"> report </li>
                </ul>
            </nav>
            <!-- End BreadCrumb -->

            <!-- title -->
            <div class="justify-content-between align-items-center pt-1 pb-2 mb-3 border-bottom mx-2">
                <h5 class="h5 mt-3 mb-0 color-darkgray"> Sales & Inventory <small></small></h5>
            </div>
            <!-- end title -->




            <div class="container-fluid-xxl pb-2">

                <div class="col-md-12 float-sm-start">

                    <div class="col-md-12 float-sm-start">

                        <!-- alert -->

                    </div>

                    <div class="col-md-12 float-sm-start">
                        <div class="btn-toolbar pull-right filter">
                            <form action="" method="POST">
                                <div class="btn-group ">

                                    <div class="col-md-3">
                                        <select name="columnType" id=""
                                            class="form-control form-control-sm bg-light text-black">
                                            <option value="owners.full_name">Owner Name</option>
                                            <option value="pigs.status">Status</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control form-control-sm ms-1" name="searchInput">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-sm btn-outline-success ms-2" value="Search"
                                            name="search">
                                        <input type="submit" class="btn btn-sm btn-success export" value="Export">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="col-md-12 p-2 float-sm-start">

                        <div class="card">

                            <div class="card-header" data-bs-toggle="collapse" data-bs-target="#collapseTable"
                                aria-expanded="true" aria-controls="collapseTable">
                                <span class="card-icon"><i class="fa fa-th"></i></span>
                                Sales & inventory Report<i class="fa fa-caret-down pull-right"></i>
                            </div>
                            <div class="card-body accordion-collapse collapse show p-0" id="collapseTable">

                                <!-- Table Div -->
                                <div class="table-responsive">

                                    <!-- Table -->
                                    <table class="table table-bordered table-hover table-sm mb-0">

                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Owner</th>

                                                <th>Pigs | Batch Name</th>
                                                <th>No. of Pigs</th>
                                                <th>Status</th>
                                                <th>Date Started</th>

                                                <th>Total Capitals</th>
                                                <th>Piglets expenses amount</th>
                                                <th>Feeds & Other expenses</th>

                                                <th>Balanced</th>

                                                <th>Sold pigs</th>
                                                <th>Sold Amount</th>
                                                <th>Date Sold</th>

                                                <th>Net amount</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            if(isset($_POST['search'])){

                                                // apply security to your data using our cleanData() function (or use directly the trim() & stripslashes() php built-in functions)
                                                $column = cleanData($_POST['columnType']);
                                                $value = cleanData($_POST['searchInput']);
                                                // search
                                                $reports = $db->view_filter_report($column, $value);
                                                
                                            }else{
                                                // all
                                                $reports = $db->view_report();
                                            }

                                            $count = 1;
                                            foreach($reports as $report)
                                            {
                                                // use security for viewing records from your database using our Sanitize() methods
                                                // or use directly the php built-in function htmlspecialchars($owner[full_name], ENT_QUOTES, 'UTF-8');
                                            
                                            ?>

                                            <tr class="odd">
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo Sanitize($report[0]); ?></td>
                                                <td><?php echo Sanitize($report[1]); ?></td>
                                                <td><?php echo Sanitize($report[2]); ?></td>
                                                <td><?php echo Sanitize($report[3]); ?></td>
                                                <td><?php echo change_date_format(Sanitize($report[4])); ?></td>

                                                <td><?php echo Sanitize($report[5]); ?></td>
                                                <td><?php echo Sanitize($report[6]); ?></td>
                                                <td><?php echo Sanitize($report[7]); ?></td>
                                                <td><?php echo Sanitize($report[8]); ?></td>
                                                <td><?php echo Sanitize($report[9]); ?></td>
                                                <td><?php echo Sanitize($report[10]); ?></td>
                                                <td><?php echo change_date_format(Sanitize($report[11])); ?></td>
                                                <td><?php echo Sanitize($report[12]); ?></td>

                                            </tr>

                                            <?php 
                                            }
                                            ?>


                                        </tbody>

                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                    </table>
                                    <!-- End Table -->

                                </div>
                                <!-- End Table Div -->

                                <?php //var_dump($db->view_report()); ?>

                            </div>
                            <!-- End Card Body -->
                        </div>
                        <!-- End card -->

                    </div>
                    <!-- End Col-12 -->


                </div>
                <!-- End col -->

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