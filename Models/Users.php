<?php

use App\Models\BaseModel;

class User extends BaseModel {

  protected $table = 'users';
  protected $pk = "user_id";

  public function addUser() {
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
    $pdo_statement = $this->db->prepare($sql);
    $success = $pdo_statement->execute([
        ':first_name' => $this->first_name,
        ':last_name' => $this->last_name,
        ':email' => $this->email
    ]);

    if ($success) {
        // Get the last inserted user ID
        return $this->db->lastInsertId();
    }

    return false;
}

  public function updateUser() {
    $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE user_id = :user_id";
    $pdo_statement = $this->db->prepare($sql);
    $success = $pdo_statement->execute([
        ':first_name' => $this->first_name,
        ':last_name' => $this->last_name,
        ':email' => $this->email,
        ':user_id' => $this->user_id,
    ]);

    return $success;
}

public function deleteUser() {
  $sql = "DELETE FROM users WHERE user_id = :user_id";
  $pdo_statement = $this->db->prepare($sql);
  $success = $pdo_statement->execute([
      ':user_id' => $this->user_id
  ]);

  return $success;
}


// detail page



  public static function whereOwner($user_id) {
      $sql = "SELECT * FROM items WHERE owner_id = :user_id";
      $stmt = self::getDb()->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);
      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public static function saveImage($userId, $imagePath) {
    $sql = "INSERT INTO images (user_id, path) VALUES (:user_id, :path)";
    $stmt = self::getDb()->prepare($sql);
    return $stmt->execute([
        ':user_id' => $userId,
        ':path' => $imagePath
    ]);
}

public static function getUserImage($userId) {
  $sql = "SELECT * FROM images WHERE user_id = :user_id";
  $stmt = self::getDb()->prepare($sql);
  $stmt->execute([':user_id' => $userId]);
  return $stmt->fetch(PDO::FETCH_OBJ);

}


  
}



  
  
