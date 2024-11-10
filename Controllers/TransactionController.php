<?php

namespace App\Controllers;

use Transaction;
use Item;
use User;

class TransactionController extends BaseController {

  public static function index () {

    $transactions = new Transaction();
    $transactions = $transactions->getAllTransactions();
    $items = Item::all();
    $users = User::all();

      self::loadView('transactions/transactions', [
          'title' => 'Transactionspage',
          'transactions' => $transactions,
          'items' => $items,
          'users' => $users

      ]);
  }

  public static function addTransaction () {
    $transaction = New Transaction();

    $transaction->lender_id = $_POST['lender_id'];
    $transaction->borrower_id = $_POST['borrower_id'];
    $transaction->lended_item_id = $_POST['lended_item_id'];
    $transaction->start_date = $_POST['start_date'];
    $transaction->end_date = $_POST['end_date'];
    $transaction->return_status = $_POST['return_status'];

   

    $succes = $transaction->addTransaction();

    if($succes) {
        header("Location: /transactions");
    } else {
        echo 'Something went wrong';
    }
  }

  public static function GetOneTransaction() {
    $transactionId = $_GET['id'] ?? null;
    $findTransaction = Transaction::find($transactionId);
    $items = Item::all();
    $users = User::all();

    
    self::loadView('transactions/edit', [
        'title' => 'Edit transaction',
        'transaction' => $findTransaction,
        'items' => $items,
        'users' => $users
    ]);
    }

  public static function editTransaction() {
    $transaction = new Transaction();

    $transaction->transaction_id = $_POST['transaction_id'];
    $transaction->lender_id = $_POST['lender_id'];
    $transaction->borrower_id = $_POST['borrower_id'];
    $transaction->lended_item_id = $_POST['lended_item_id'];
    $transaction->start_date = $_POST['start_date'];
    $transaction->end_date = $_POST['end_date'];
    $transaction->return_status = $_POST['return_status'];

    $success = $transaction->updateTransaction();

    if($success) {
        header("Location: /transactions");
    } else {
        echo 'Something went wrong';
    }
  }
}