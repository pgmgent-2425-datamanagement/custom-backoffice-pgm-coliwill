<?php

use App\Models\BaseModel;

class Transaction extends BaseModel {
  protected $table = 'transactions';
  protected $pk = "transaction_id";

  // Fetch borrowed items for a user
  public static function getBorrowedItems($user_id) {
      // Create an instance of the Transaction class to access the non-static db property
      $obj = new static();
      
      // Access the database connection
      $db = $obj->db;

      // Ensure the database connection is set
      if ($db === null) {
          throw new \Exception("Database connection is not set.");
      }

      $sql = "SELECT i.name AS item_name, i.description, t.start_date, t.end_date, t.return_status, 
                     u.first_name AS lender_first_name, u.last_name AS lender_last_name
              FROM transactions t
              JOIN items i ON t.item_id = i.item_id
              JOIN users u ON t.lender_id = u.user_id
              WHERE t.borrower_id = :user_id";

      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);

      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Fetch lent items for a user
  public static function getLentItems($user_id) {
      // Create an instance of the Transaction class to access the non-static db property
      $obj = new static();
      
      // Access the database connection
      $db = $obj->db;

      // Ensure the database connection is set
      if ($db === null) {
          throw new \Exception("Database connection is not set.");
      }

      $sql = "SELECT i.name AS item_name, i.description, t.start_date, t.end_date, t.return_status, 
                     u.first_name AS borrower_first_name, u.last_name AS borrower_last_name
              FROM transactions t
              JOIN items i ON t.item_id = i.item_id
              JOIN users u ON t.borrower_id = u.user_id
              WHERE t.lender_id = :user_id";

      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);

      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

