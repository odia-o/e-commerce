<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}
    
//    $rec = Student_course::find_record($_GET['c_id'], $session->id);
//    $rec->destroy();
//    $tmp = Record::find_record($_GET['c_id'], $session->id);
//    $tmp->destroy();
unset($_SESSION['items']);
$session->items = $_SESSION['items'];
        redirect_to("checkout.php");
   
?>