<?php

use App\Models\BaseModel;

class Item extends BaseModel {

  protected $table = 'items';
  protected $pk = "item_id";
  public function available() {
    $sql = "SELECT COUNT(*) AS available_items FROM items WHERE available = 1;;
";
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute();
  
    $db_items = $pdo_statement->fetchAll();

   
  
    return self::castToModel($db_items);

  }

  public static function whereOwner($user_id) {
    // Create an instance of the Item class
    $obj = new static();  // or new self() for this class
    
    // Access the database connection
    $db = $obj->db;

    // Ensure the database connection is set
    if ($db === null) {
        throw new \Exception("Database connection is not set.");
    }

    // Prepare and execute the query
    $sql = "SELECT * FROM items WHERE owner_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':user_id' => $user_id]);

    // Fetch all records and return as objects
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
}

public function updateItem() {
  $sql = "UPDATE items SET name = :name, description = :description, price = :price, available = :available, owner_id = :owner_id WHERE item_id = :item_id";
  $pdo_statement = $this->db->prepare($sql);
  $success = $pdo_statement->execute([
      ':name' => $this->name,
      ':description' => $this->description,
      ':price' => $this->price,
      ':available' => $this->available,
      ':item_id' => $this->item_id,
      ':owner_id' => $this->owner_id
  ]);

  return $success;
}

public function deleteItem() {
  $sql = "DELETE FROM items WHERE item_id = :item_id";
  $pdo_statement = $this->db->prepare($sql);
  $success = $pdo_statement->execute([
      ':item_id' => $this->item_id
  ]);

  return $success;
}

public function addItem() {
  $sql = "INSERT INTO items (name, description, available, price) VALUES (:name, :description, :available, :price)";
  $pdo_statement = $this->db->prepare($sql);
  $succes = $pdo_statement->execute([
    ':name' => $this->name,
    ':description' => $this->description,
    ':available' => $this->available,
    ':price' => $this->price
  ]);

  return $succes;
}

}