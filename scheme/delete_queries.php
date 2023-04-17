<?php

//also include the core
require_once('core.php');

//create object of database/Model class
$con = new Model();

//session user validation (security for null users - only authenticated users can used/access this file or else it will redirect to login)
if (empty($_SESSION['username'])) {
    redirect('login');
}

/* Start getting & setting queries
 *
 * 
 */

if(!empty($_GET['owner']))
{
    $owner_id = $_GET['owner'];
    // call opencon() from database class then create delete query
    $con->db->prepare("DELETE from owners WHERE owner_id=$owner_id")->execute();
    // redirect
    redirect('ownerList_view');
}

if(!empty($_GET['pig']))
{
    $pig_id = $_GET['pig'];
    // call opencon() from database class then create delete query
    $con->db->prepare("DELETE from pigs WHERE pig_id=$pig_id")->execute();
    // redirect
    redirect('pigList_view');
}

if(!empty($_GET['expenses']))
{
    $exp_id = $_GET['expenses'];
    // call opencon() from database class then create delete query
    $con->db->prepare("DELETE from expenses WHERE exp_id=$exp_id")->execute();
    // redirect
    redirect('expensesList_view');
}

if(!empty($_GET['capital']))
{
    $capital_id = $_GET['capital'];
    // call opencon() from database class then create delete query
    $con->db->prepare("DELETE from capitals WHERE capital_id=$capital_id")->execute();
    // redirect
    redirect('capitalList_view');
}

if(!empty($_GET['sales']))
{
    $sale_id = $_GET['sales'];
    // call opencon() from database class then create delete query
    $con->db->prepare("DELETE from sales WHERE sale_id=$sale_id")->execute();
    // redirect
    redirect('saleList_view');
}


?>