<?php
require_once(LIB_PATH.DS."database.php");

class Admin extends DatabaseObject{
    protected static $table_name = "users";
    protected static $db_fields = array("id", "email", "password");
    protected static $db_fields2 = array("email", "password");
    public $id;
    public $email;
    public $password;
    public $errors = [];
    
    
   
    
    public static function authenticate($username="", $password="") {
        global $db;
        $username = $db->escape_value($username);
        $password = $db->escape_value($password);
        
        $query = "SELECT * FROM admin ";
        $query .= "WHERE email = '{$username}' ";
        $query .= "AND password = md5('{$password}') ";
        $query .= "LIMIT 1";
        
        $result_array = self::find_by_sql($query);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    
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
            
            if(strlen($this->username) >= 255 || empty($this->username)) {
                $this->errors[] = "The Last name can only be 255 characters long.";
                return false;
            }

               
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