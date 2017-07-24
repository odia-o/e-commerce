<?php
require_once(LIB_PATH.DS."database.php");

class Products extends DatabaseObject{
    protected static $table_name = "products";
    protected static $db_fields = array("id", "product_name", "product_price", "qty_in_stock", "description");
    protected static $db_fields2 = array("product_name", "product_price", "qty_in_stock", "description");
    public $id;
    public $product_name;
    public $product_price;
    public $qty_in_stock;
    public $description;
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