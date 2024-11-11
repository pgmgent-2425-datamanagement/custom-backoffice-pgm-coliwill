<?php

use App\Models\BaseModel;

class Item extends BaseModel {

  protected $table = 'items';
  protected $pk = "item_id";

  public function available() {
    $sql = "SELECT COUNT(*) AS available_items FROM items WHERE available = 1;";
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute();
    $db_items = $pdo_statement->fetchAll();
    return self::castToModel($db_items);
  }

  public function unavailable() {
    $sql = "SELECT COUNT(*) AS unavailable_items FROM items WHERE available = 0;";
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute();
    $db_items = $pdo_statement->fetchAll();
    return self::castToModel($db_items);
  }

  public static function whereOwner($user_id) {
    $obj = new static();
    $db = $obj->db;
    if ($db === null) {
        throw new \Exception("Database connection is not set.");
    }
    $sql = "SELECT * FROM items WHERE owner_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':user_id' => $user_id]);
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
    $success = $pdo_statement->execute([':item_id' => $this->item_id]);
    return $success;
  }

  public function addItem() {
    $sql = "INSERT INTO items (name, description, available, price, owner_id) VALUES (:name, :description, :available, :price, :owner_id)";
    $pdo_statement = $this->db->prepare($sql);
    $succes = $pdo_statement->execute([
      ':name' => $this->name,
      ':description' => $this->description,
      ':available' => $this->available,
      ':price' => $this->price,
      ':owner_id' => $this->owner_id,
    ]);
    return $succes;
  }

  public static function search($query) {
    $obj = new static();
    $db = $obj->db;
    if ($db === null) {
        throw new \Exception("Database connection is not set.");
    }
    $sql = "SELECT * FROM items WHERE name LIKE :query OR description LIKE :query";
    $stmt = $db->prepare($sql);
    $stmt->execute([':query' => '%' . $query . '%']);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public static function filterByAvailability($availability) {
    $obj = new static();
    $db = $obj->db;
    if ($db === null) {
        throw new \Exception("Database connection is not set.");
    }
    $sql = "SELECT * FROM items WHERE available = :availability";
    $stmt = $db->prepare($sql);
    $stmt->execute([':availability' => $availability]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

}
