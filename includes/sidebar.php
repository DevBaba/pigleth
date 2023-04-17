<nav id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse align-items-stretch overflow-auto scrollbar-success">
    <div class="position-sticky">
        <div class="list-group list-group-flush border-bottom border-end scrollarea">

            <div class="top-active align-items-center brandside">
                <div class="p-2" style="text-align:center">
                    <img src="public/img/brand.png" height="100px" alt="MinSU">
                </div>
            </div>

            <!-- <div class="list-group-item list-group-item-action top-active py-3 lh-tight" aria-current="true">
                            
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">Juan Dela Cruz</strong>
                                <small> 1 </small>
                            </div>
                            <div class="col-10 mb-1 small"><i>Instructor I</i></div>
                            </div> -->

            <a href="<?php echo base_url(); ?>index.php"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('index.php') ?> <?php active('') ?>">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-tachometer me-2"></i>
                        Dashboard
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>


            <!-- Owner -->
            <a href="#"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('ownerList_view.php') ?> <?php active('ownerAdd_view.php') ?>"
                data-bs-toggle="collapse" data-bs-target="#utilities-collapse3" aria-expanded="false">
                <div class="w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-users me-2"></i>
                        Owners
                        <span class="fa fa-caret-down pull-right"></span>
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>
            <div class="collapse" id="utilities-collapse3">
                <ul class="btn-toggle-nav list-unstyled fw-normal medium mb-0">

                    <li class="bg-dark ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>ownerList_view.php" class="text-white "><i
                                class="fa fa-icon fa-th-large me-1"></i> View List</a>
                    </li>
                    <li class="bg-dark pb-2 ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>ownerAdd_view.php" class="text-white "><i
                                class="fa fa-icon fa-plus me-1"></i>
                            Create New</a>
                    </li>

                </ul>
            </div>

            <!-- Pigs -->
            <a href="#"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('pigList_view.php') ?> <?php active('pigAdd_view.php') ?>"
                data-bs-toggle="collapse" data-bs-target="#utilities-collapse1" aria-expanded="false">
                <div class="w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-truck me-2"></i>
                        Pigs
                        <span class="fa fa-caret-down pull-right"></span>
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>
            <div class="collapse" id="utilities-collapse1">
                <ul class="btn-toggle-nav list-unstyled fw-normal medium mb-0">

                    <li class="bg-dark ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>pigList_view.php" class="text-white "><i
                                class="fa fa-icon fa-th-large me-1"></i> View
                            Pig List</a>
                    </li>
                    <li class="bg-dark pb-2 ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>pigAdd_view.php" class="text-white "><i
                                class="fa fa-icon fa-plus me-1"></i> Create New
                            Pig</a>
                    </li>

                </ul>
            </div>

            <!-- Capital -->
            <a href="#"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('capitalList_view.php') ?> <?php active('capitalAdd_view.php') ?>"
                data-bs-toggle="collapse" data-bs-target="#utilities-collapse2" aria-expanded="false">
                <div class="w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-credit-card me-2"></i>
                        Capitals
                        <span class="fa fa-caret-down pull-right"></span>
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>
            <div class="collapse" id="utilities-collapse2">
                <ul class="btn-toggle-nav list-unstyled fw-normal medium mb-0">

                    <li class="bg-dark ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>capitalList_view.php" class="text-white "><i
                                class="fa fa-icon fa-th-large me-1"></i>
                            View Capital
                            List</a>
                    </li>
                    <li class="bg-dark pb-2 ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>capitalAdd_view.php" class="text-white "><i
                                class="fa fa-icon fa-plus me-1"></i> Add
                            New Capital</a>
                    </li>

                </ul>
            </div>

            <!-- Expenses -->
            <a href="#"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('expensesList_view.php') ?> <?php active('expensesAdd_view.php') ?>"
                data-bs-toggle="collapse" data-bs-target="#utilities-collapses" aria-expanded="false">
                <div class="w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-money me-2"></i>
                        Expenses
                        <span class="fa fa-caret-down pull-right"></span>
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>
            <div class="collapse" id="utilities-collapses">
                <ul class="btn-toggle-nav list-unstyled fw-normal medium mb-0">

                    <li class="bg-dark ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>expensesList_view.php" class="text-white "><i
                                class="fa fa-icon fa-th-large me-1"></i>
                            View expenses</a>
                    </li>
                    <li class="bg-dark pb-2 ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>expensesAdd_view.php" class="text-white "><i
                                class="fa fa-icon fa-plus me-1"></i> Add
                            New Expenses</a>
                    </li>

                </ul>
            </div>

            <a href="#"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('saleList_view.php') ?> <?php active('saleAdd_view.php') ?>"
                data-bs-toggle="collapse" data-bs-target="#utilities-collapse5" aria-expanded="false">
                <div class="w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-edit me-2"></i>
                        Sales
                        <span class="fa fa-caret-down pull-right"></span>
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>
            <div class="collapse" id="utilities-collapse5">
                <ul class="btn-toggle-nav list-unstyled fw-normal medium mb-0">

                    <li class="bg-dark ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>saleList_view.php" class="text-white "><i
                                class="fa fa-icon fa-th-large me-1"></i> View
                            Sales</a>
                    </li>
                    <li class="bg-dark pb-2 ps-4 sub-link">
                        <a href="<?php echo base_url(); ?>saleAdd_view.php" class="text-white "><i
                                class="fa fa-icon fa-plus me-1"></i> Add New
                            Sales</a>
                    </li>

                </ul>
            </div>

            <a href="<?php echo base_url(); ?>report_view.php"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('report_view.php') ?>">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-th me-2"></i>
                        Reports
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>

            <a href="<?php echo base_url(); ?>setting.php"
                class="list-group-item list-group-item-action lh-tight side-menu <?php active('setting.php') ?>">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-cog me-2"></i>
                        User Settings
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>

            <a href="<?php echo base_url(); ?>logout.php"
                class="list-group-item list-group-item-action lh-tight side-menu">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <div class="mb-0">
                        <i class="fa fa-icon fa-key me-2"></i>
                        Logout
                    </div>
                    <!-- <small class="text-muted"></small> -->
                </div>
            </a>

            <a href="#" class="list-group-item list-group-item-action py-3 lh-tight bg-light">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1"><?php echo change_date_format(date_today()); ?></strong>
                    <small class="text-muted"></small>
                </div>
                <div class="col-12 mb-1 small">
                    <i class="fa fa-bolt"></i> <?php echo $_SESSION['total_time'] ;?>
                    &nbsp; <i class="fa fa-server"></i> <span class="text">
                        <?php echo round(memory_get_usage() / 1024 / 1024, 2) ;?> MB </span>
                </div>
            </a>



        </div>
    </div>
</nav>