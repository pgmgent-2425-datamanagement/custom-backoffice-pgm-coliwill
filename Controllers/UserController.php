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

}