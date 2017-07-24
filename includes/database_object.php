<?php
require_once(LIB_PATH.DS."database.php");

class DatabaseObject {
    public static function find_all() {
        return self::find_by_sql("SELECT * FROM ".static::$table_name);
    }
    
    public static function find_by_id($id=0) {
        global $db;
        $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name. " WHERE id=".$db->escape_value($id)." LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    private static function instantiate($record) {
        $called_class = get_called_class();
        $object = new $called_class;

        
        foreach($record as $attribute=>$value) {
            if($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }
    
    public static function find_by_sql($sql="") {
        global $db;
        $result_set = $db->query($sql);
        $object_array = array();
        while($row = $db->fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }
    
    private function has_attribute($attribute) {
        $object_vars = get_object_vars($this);
        return array_key_exists($attribute, $object_vars);
    }
    
    public function save() {
    return isset($this->id) ? $this->update() : $this->create();
    }
    
    protected function attributes() {
   $attributes = array();
    foreach(static::$db_fields2 as $field) {
        if(property_exists($this, $field)) {
            $attributes[$field] = $this->$field;
        }
    }
    return $attributes;
}
    
    protected function sanitized_attributes() {
        global $db;
        $clean_attributes = array();
        foreach($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $db->escape_value($value);
        }
        return $clean_attributes;
    }
    
    protected function create() {
        global $db;
        $attributes = $this->sanitized_attributes();
        $query = "INSERT INTO ".static::$table_name." (";
        $query .= join(", ", array_keys($attributes));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($attributes));
        $query .= "')";
        
        if($db->query($query)) {
            $this->id = $db->insert_id();
            return true;
        }
        else
        {
            return false;
        }
    } 
    
    protected function update() {
        global $db;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $query = "UPDATE ".static::$table_name." SET ";
        $query .= join(", ", $attribute_pairs);
        $query .= " WHERE id=". $db->escape_value($this->id);
        
       $db->query($query);
        return ($db->affected_rows() == 1) ? true : false;
    } 
    
    protected function delete() {
        global $db;
        $query = "DELETE FROM ".static::$table_name." ";
        $query .= "WHERE id=". $db->escape_value($this->id);
        $query .= " LIMIT 1";
        $db->query($query);
        return ($db->affected_rows() == 1) ? true : false;
    }
    
    public static function count_all() {
        global $db;
        $query = "SELECT COUNT(*) FROM ".static::$table_name;
        $result_set = $db->query($query);
        $row = $db->fetch_array($result_set);
        return array_shift($row);
    }
}
?>