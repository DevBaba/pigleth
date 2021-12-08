<?php
// display lang to - measure the speed of rendering page
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
//----------------------------------------------------------

require_once('scheme/core.php');

//create object of database/Model class
$db = new Model();

//session user validation - to validate if the user was already login | if yes then no need to login, just go to home page
if (!empty($_SESSION['username'])) {
    redirect('index'); // index or the home page
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signin</title>
    <link rel="icon" href="public/img/brand.png">

    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap-5.0.1-dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="public/customcss/signin.css" rel="stylesheet">
    <!-- http://code.jquery.com/ -->
    <script src="public/validate-js/jquery-3.6.0.min.js"></script>
    <script src="public/validate-js/jquery.validate.js"></script>
    <script src="public/validate-js/form.js"></script>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="post" id="sigin-validate">
            <img class="mb-4" src="public/img/brand.png" alt="" width="172" height="157">
            <h1 class="h5 mb-3 fw-normal"><strong style="color:green">PigLeth</strong><b style="color: #555"></b></h1>

            <div class="form-group pb-2">

                <?php
                // login post - if the user clicked the button named "login"
                if (isset($_POST['login'])) {

                    
                    // apply security to your data using our cleanData() function (or use directly the trim() & stripslashes() php built-in functions)
                    $username = cleanData($_POST['username']);
                    $password = cleanData($_POST['password']);

                    // call the check method from our class(database) using the $db ogject
                    $result = $db->check($username, $password); // check the username & password if in database

                    // check if have result
                    if ($result) {
                        // then get the result data and use it in condition - to double check if password in db is equal to password in textbox
                        if ($result['username'] == $_POST['username'] && $result['password'] == sha1(md5($_POST['password']))) {
                        
                            // then set session - this session is used to validate users in all admin pages
                            $_SESSION['username'] = $result['username']; // session use to check if user is login
                            $_SESSION['role'] = $result['role']; // session use to check if user is admin or user - it is used in different authorization like (only admin will have a "delete" button in all pages)
                            
                            // redirect to admin home
                            header('location:index.php'); // or use the redirect function - from scheme/setting_functions.php

                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <h4 class="alert-heading">Something went wrong!</h4>
                              <p></p>
                              <hr>
                              <p class="mb-0"> Invalid Username or Password! </p>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Something went wrong!</h4>
                        <p></p>
                        <hr>
                        <p class="mb-0"> No records found in database! </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
              ?>

            </div>

            <div class="form-group pb-2">
                <!-- <label for="username">Username / Email</label> -->
                <input type="text" class="form-control form-control-md" id="username" name="username"
                    placeholder="Username" required>
            </div>
            <div class="form-group mb-4">
                <!-- <label for="password">Password</label> -->
                <input type="password" class="form-control form-control-md mb-0" id="password" name="password"
                    placeholder="Password" required>
            </div>

            <input class="w-100 p-1 btn btn-md btn-success" type="submit" value="Sign in" name="login">

            <p class="mt-5 mb-3 text-muted foot-print"> <a href="https://confired.com">Developer</a> | &copy; 2021 </p>

        </form>
    </main>
    <script src="public/bootstrap-5.0.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

// display lang to - measure the speed of rendering page

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
$_SESSION['total_time'] = (float)$total_time;
?>