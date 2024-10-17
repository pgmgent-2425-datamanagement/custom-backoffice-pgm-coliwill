<?php

use App\Models\BaseModel;

class Item extends BaseModel {
  public function available() {
    $sql = "SELECT COUNT(*) AS available_items FROM items WHERE available = 1;;
";
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute();
  
    $db_items = $pdo_statement->fetchAll();

   
  
    return self::castToModel($db_items);

  }
}