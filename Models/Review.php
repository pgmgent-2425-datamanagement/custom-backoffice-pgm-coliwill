<?php

use App\Models\BaseModel;

class Review extends BaseModel {
  protected $table = 'reviews';
  protected $pk = "review_id";

  // Fetch reviews given by the user
  public static function getGivenReviews($user_id) {
      // Create an instance of the Review class to access the non-static db property
      $obj = new static();
      
      // Access the database connection
      $db = $obj->db;

      // Ensure the database connection is set
      if ($db === null) {
          throw new \Exception("Database connection is not set.");
      }

      $sql = "SELECT r.rating, r.comment, i.name AS item_name, u.first_name AS lender_first_name, u.last_name AS lender_last_name
              FROM reviews r
              JOIN transactions t ON r.transaction_id = t.transaction_id
              JOIN items i ON t.item_id = i.item_id
              JOIN users u ON t.lender_id = u.user_id
              WHERE t.borrower_id = :user_id";

      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);

      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Fetch reviews received by the user
  public static function getReceivedReviews($user_id) {
      // Create an instance of the Review class to access the non-static db property
      $obj = new static();
      
      // Access the database connection
      $db = $obj->db;

      // Ensure the database connection is set
      if ($db === null) {
          throw new \Exception("Database connection is not set.");
      }

      $sql = "SELECT r.rating, r.comment, i.name AS item_name, u.first_name AS borrower_first_name, u.last_name AS borrower_last_name
              FROM reviews r
              JOIN transactions t ON r.transaction_id = t.transaction_id
              JOIN items i ON t.item_id = i.item_id
              JOIN users u ON t.borrower_id = u.user_id
              WHERE t.lender_id = :user_id";

      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $user_id]);

      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}

