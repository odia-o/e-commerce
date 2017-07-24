<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}

    $i = $_SESSION['items'][$_GET['index']];
$user = Users::find_by_id($session->id);
if($user->card_balance < $i->total){
    echo "transaction failed due to insufficient balance!";
}
else {
$user->card_balance -= $i->total;
if($user->save()){
    $product = Products::find_by_id($i->id);
    $product->qty_in_stock -= $i->qty;
    if($product->save()){
        $u_p = new User_product();
        $u_p->user_id = $session->id;
        $u_p->product_id = $i->id;
        $u_p->qty_purchased = $i->qty;
        $u_p->total = $i->total;
        if($u_p->save()){
            $txn = new Transactions();
            $txn->user_id = $session->id;
            $txn->items_summary = $i->name;
            $txn->total = $i->total;
            if($txn->save()){
 unset($_SESSION['items'][$_GET['index']]); 
                
                
                redirect_to("checkout.php");
            }
            else {
                echo "transaction failed";
            }
        }
        else {
            echo "u_p failed";
        }
    }
    else {
        echo "product failed";
    }
}
else {
    echo "user failed";
}
}



   
?>