<?php
namespace App\Models;

#[\AllowDynamicProperties]
class BaseModel {

    protected $table;
    protected $pk;
    protected $db;

    public static function __callStatic ($method, $arg) {
        $obj = new static;
        $result = call_user_func_array (array ($obj, $method), $arg);
        if (method_exists ($obj, $method))
            return $result;
        return $obj;
    }

    public function __construct() {

        if(!isset($this->table)) {
            $single = strtolower( $this->getClassName(get_called_class()));
            switch(substr($single, -1)) {
                case 'y':
                    $this->table = substr($single, 0, -1) . 'ies';
                    break;
                case 's':
                    $this->table = $single;
                    break;
                default:
                    $this->table = $single . 's';
            }
        }
    
        // Dynamically set the primary key based on table name
        if(!isset($this->pk)) {
            $this->pk = $this->table . '_id';  // Assumes the primary key is <table>_id (e.g., user_id for users table)
        }
    
        if(!isset($this->db)) {
            global $db;
            $this->db = $db;
        }
    }

    private function all () {

        $sql = 'SELECT * FROM `' . $this->table . '`';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items);
    }

    private function find ( int $id ) {

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_item = $pdo_statement->fetchObject();

        return self::castToModel($db_item);
    }

    protected function castToModel ($object) {
        if(!is_object($object) && isset($object[0]) && is_array($object[0])) {
            //array of items
            $items = [];
            foreach($object as $db_item) {
                $items[] = $this->castToModel($db_item);
            }
            return $items;
        }
        $db_item = (object) $object;
        //Creates new Model
        $model_name = get_class($this);
        $item = new $model_name();
        //Loops through the db columns and 
        
        foreach($db_item as $column => $value) {
            $item->{$column} = $value;
        } 
        return $item;
    }

    //static method to call like: Model::deleteById(1);
    private function deleteById(int $id) {
        $sql = 'DELETE FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $this->db->prepare($sql);
        return $pdo_statement->execute([':p_id' => $id]);
    }
    

    //public method to call like: $my_model->delete();
    public function delete() {
        // Pass the primary key value, not the column name
        $this->deleteById($this->{$this->pk});
    }

    private function getClassName($classname) {
        if(strpos($classname, '\\') === false) {
            //not in a namespace
            return $classname;
        }
        //in a namespace
        return (substr($classname, strrpos($classname, '\\') + 1));
    }
    

}