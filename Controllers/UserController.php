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
    
        $success = $user->addUser();
    
        if ($success) {
            $userId = $success; 
        
            
            if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] === 0) {
                $uploadDir = "uploads/";
                $imageName = uniqid() . '_' . basename($_FILES['user_image']['name']);
                $imagePath = $uploadDir . $imageName;
            
               
                if (move_uploaded_file($_FILES['user_image']['tmp_name'], $imagePath)) {
                    User::saveImage($userId, $imagePath);
                    echo 'Image uploaded successfully!';
                } else {
                    echo 'Failed to move uploaded file.';
                }
            }
        
            header("Location: /users");
        } else {
            echo 'Something went wrong.';
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

    

        public static function editUser() {
           
            $userId = $_POST['user_id'] ?? null;
        
            if (!$userId) {
                echo "User ID not provided.";
                return;
            }
        
          
            $user = User::find($userId);
        
            if (!$user) {
                echo "User not found.";
                return;
            }
        
          
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->email = $_POST['email'];
        
           
            $success = $user->updateUser();
        
          
            if ($success) {
               
                header("Location: /users");
            } else {
                echo "Something went wrong.";
            }
        }

        public static function deleteUser() {
           
            $userId = $_POST['user_id'] ?? null;
        
            if (!$userId) {
                echo "User ID not provided.";
                return;
            }
        
         
            $user = User::find($userId);
        
            if (!$user) {
                echo "User not found.";
                return;
            }
        
            $success = $user->deleteUser();
        
            
            if ($success) {
                
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
    
        
            $user = User::find($userId);
    
           
            $userImage = User::GetUserImage($userId);
            $itemsOwned = Item::whereOwner($userId);
            $itemsBorrowed = Transaction::getBorrowedItems($userId);
            $itemsLent = Transaction::getLentItems($userId);
            $reviewsGiven = Review::getGivenReviews($userId);
            $reviewsReceived = Review::getReceivedReviews($userId);
    
          
            self::loadView('users/detail', [

                'user' => $user,
                'itemsOwned' => $itemsOwned,
                'itemsBorrowed' => $itemsBorrowed,
                'itemsLent' => $itemsLent,
                'reviewsGiven' => $reviewsGiven,
                'reviewsReceived' => $reviewsReceived,
                'userImage' => $userImage
            ]);

   

        }

      
        
    }

    

    

