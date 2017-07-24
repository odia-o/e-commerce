<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}

    $tmp = $_SESSION['items'];
$g_total = 0;
$summary = "";
foreach($tmp as $i){
    $g_total += $i->total;
    $summary .= $i->name.", ";
    $product = Products::find_by_id($i->id);
    $product->qty_in_stock -= $i->qty;
    $product->save();
        $u_p = new User_product();
        $u_p->user_id = $session->id;
        $u_p->product_id = $i->id;
        $u_p->qty_purchased = $i->qty;
        $u_p->total = $i->total;
        $u_p->save();
    
}
$user = Users::find_by_id($session->id);
if($user->card_balance < $g_total){
    echo "transaction failed due to insufficient balance!";
}
else {
    $user->card_balance -= $g_total;
if($user->save()){
    
            $txn = new Transactions();
            $txn->user_id = $session->id;
            $txn->items_summary = $summary;
            $txn->total = $i->total;
            if($txn->save()){
 unset($_SESSION['items']); 
                
                
                redirect_to("checkout.php");
            }
            else {
                echo "transaction failed";
            }
        
}
else {
    echo "user failed";
}
}




   
?>