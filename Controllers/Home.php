<?php

namespace App\Controllers;

use User;
use Item;

class HomeController extends BaseController {

    public static function index () {

        $itemModel = new Item();
        $availableItems = $itemModel->available();

        $users = User::all();
       
       

        self::loadView('/home', [
            'title' => 'Homepage',
            "users" => $users,
            "availableItems" => $availableItems
        ]);
    }

}