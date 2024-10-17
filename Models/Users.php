<?php

use App\Models\BaseModel;

class User extends BaseModel {

  public function addUser() {
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
    $pdo_statement = $this->db->prepare($sql);
    $succes = $pdo_statement->execute([
      ':first_name' => $this->first_name,
      ':last_name' => $this->last_name,
      ':email' => $this->email
    ]);

    return $succes;
  }
  
}