<?php
require_once(LIB_PATH.DS."database.php");

class Transactions extends DatabaseObject{
    protected static $table_name = "transactions";
    protected static $db_fields = array("id", "user_id", "items_summary", "total");
    protected static $db_fields2 = array("user_id", "items_summary", "total");
    public $id;
    public $user_id;
    public $items_summary;
    public $total;
   



    
     public function save() {
        if(isset($this->id)) {
               if(parent::update()){
                   return true;
               }
            else {
                return false;
            }
       
            
        }
        else {
            
            
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