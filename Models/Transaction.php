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
              JOIN items i ON t.lended_item_id = i.item_id
              JOIN users u ON t.lender_id = u.user_id
              WHERE t.borrower_id = :user_id";

      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);

      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }


  public static function getLentItems($user_id) {
      
      $obj = new static();
      
      
      $db = $obj->db;

      
      if ($db === null) {
          throw new \Exception("Database connection is not set.");
      }

      $sql = "SELECT i.name AS item_name, i.description, t.start_date, t.end_date, t.return_status, 
                     u.first_name AS borrower_first_name, u.last_name AS borrower_last_name
              FROM transactions t
              JOIN items i ON t.lended_item_id = i.item_id
              JOIN users u ON t.borrower_id = u.user_id
              WHERE t.lender_id = :user_id";

      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);

      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

    public function addTransaction() {
        $sql = "INSERT INTO transactions (lender_id, borrower_id, lended_item_id, start_date, end_date, return_status) VALUES (:lender_id, :borrower_id, :lended_item_id, :start_date, :end_date, :return_status)";
        $pdo_statement = $this->db->prepare($sql);
        $succes = $pdo_statement->execute([
        ':lender_id' => $this->lender_id,
        ':borrower_id' => $this->borrower_id,
        ':lended_item_id' => $this->lended_item_id,
        ':start_date' => $this->start_date,
        ':end_date' => $this->end_date,
        ':return_status' => $this->return_status
        ]);
    
        return $succes;
    }

    public function getAllTransactions() {
        $sql = "SELECT lender.first_name AS lender_first_name,
       lender.last_name AS lender_last_name,
       borrower.first_name AS borrower_first_name,
       borrower.last_name AS borrower_last_name,
       items.name AS item_name,
       transactions.transaction_id,
       transactions.return_status,
       transactions.start_date,
        transactions.end_date
FROM transactions
INNER JOIN users AS lender ON transactions.lender_id = lender.user_id
INNER JOIN users AS borrower ON transactions.borrower_id = borrower.user_id
INNER JOIN items ON transactions.lended_item_id = items.item_id;";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $db_items = $pdo_statement->fetchAll(); 
        return self::castToModel($db_items);
    }

    public function updateTransaction() {
        $sql = "UPDATE transactions SET lender_id = :lender_id, borrower_id = :borrower_id, lended_item_id = :lended_item_id, start_date = :start_date, end_date = :end_date, return_status = :return_status WHERE transaction_id = :transaction_id";
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':lender_id' => $this->lender_id,
            ':borrower_id' => $this->borrower_id,
            ':lended_item_id' => $this->lended_item_id,
            ':start_date' => $this->start_date,
            ':end_date' => $this->end_date,
            ':return_status' => $this->return_status,
            ':transaction_id' => $this->transaction_id
        ]);
    
        return $success;
    }


}

