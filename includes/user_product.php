<?php
require_once(LIB_PATH.DS."database.php");

class User_product extends DatabaseObject{
    protected static $table_name = "user_products";
    protected static $db_fields = array("user_id", "product_id", "qty_purchased", "total");
    protected static $db_fields2 = array("user_id", "product_id", "qty_purchased", "total");

    public $user_id;
    public $product_id;
    public $qty_purchased;
    public $total;
    public $errors = [];


    
     public function save() {
        if(isset($this->id)) {
            if(parent::update()){
                return true;
            }
            else {
                $this->errors[] = "Something went wrong";
                return false;
            }
        }
        else {
            if(!empty($this->errors)) {return false;}
           
                if(parent::create()) {
                    return true;
                
            }
            else {
                $this->errors[] = "Something went wrong";
                return false;
            }
        }
    }
    
      public function destroy()
    {
        if(parent::delete()) {
            return true;
        }
        else {
            return false;
        }
    }

}
?>