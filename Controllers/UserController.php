<?php

namespace App\Controllers;

use User;
use Item;
use Transaction;
use Review;


class UserController extends BaseController {

    public static function index () {

      $users = User::all();

      

        self::loadView('users/users', [
            'title' => 'Userspage',
            "users" => $users

        ]);
    }

    public static function addUser() {
       

        $user = new User();

        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];

        $succes = $user->addUser();

        if($succes) {
            header("Location: /users");
        } else {
            echo 'Something went wrong';
        }

        
    }

    public static function GetOneUser() {
        $userId = $_GET['id'] ?? null;
        $findUser = User::find($userId);
        
        self::loadView('users/edit', [
            'title' => 'Edit user',
            'user' => $findUser
        ]);
        }

    public static function GetDetailUser() {
        $userId = $_GET['id'] ?? null;
        $findUser = User::find($userId);
        
        self::loadView('users/detail', [
            'title' => 'Detail user',
            'user' => $findUser
        ]);
    }

        public static function editUser() {
            // Get the user ID from the form (or URL if needed)
            $userId = $_POST['user_id'] ?? null;
        
            if (!$userId) {
                echo "User ID not provided.";
                return;
            }
        
            // Fetch the user from the database
            $user = User::find($userId);
        
            if (!$user) {
                echo "User not found.";
                return;
            }
        
            // Update the user object with form data
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->email = $_POST['email'];
        
            // Save the updated user to the database
            $success = $user->updateUser();
        
            // Check if the update was successful
            if ($success) {
                // Redirect to the users page after success
                header("Location: /users");
            } else {
                echo "Something went wrong.";
            }
        }

        public static function deleteUser() {
            // Get the user ID from the POST request
            $userId = $_POST['user_id'] ?? null;
        
            if (!$userId) {
                echo "User ID not provided.";
                return;
            }
        
            // Find the user in the database
            $user = User::find($userId);
        
            if (!$user) {
                echo "User not found.";
                return;
            }
        
            // Delete the user from the database
            $success = $user->deleteUser();
        
            // Check if the deletion was successful
            if ($success) {
                // Redirect to the users page after successful deletion
                header("Location: /users");
                exit;
            } else {
                echo "Something went wrong.";
            }
        }

        public static function getUserDetail() {
            $userId = $_GET['id'] ?? null;
    
            if (!$userId) {
                echo "User ID not provided.";
                return;
            }
    
            // Fetch user info
            $user = User::find($userId);
    
            // Fetch items owned, lent, borrowed, reviews
            $itemsOwned = Item::whereOwner($userId);
            $itemsBorrowed = Transaction::getBorrowedItems($userId);
            $itemsLent = Transaction::getLentItems($userId);
            $reviewsGiven = Review::getGivenReviews($userId);
            $reviewsReceived = Review::getReceivedReviews($userId);
    
            // Load the view and pass the data
            self::loadView('users/detail', [
                'user' => $user,
                'itemsOwned' => $itemsOwned,
                'itemsBorrowed' => $itemsBorrowed,
                'itemsLent' => $itemsLent,
                'reviewsGiven' => $reviewsGiven,
                'reviewsReceived' => $reviewsReceived
            ]);

   

        }

      
        
    }

    

    

