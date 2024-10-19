<?php

namespace App\Controllers;

use User;

class UserController extends BaseController {

    public static function index () {

      $users = User::all();

      

        self::loadView('/users', [
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

    

    

}