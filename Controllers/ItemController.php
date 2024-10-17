<?php

namespace App\Controllers;

use Item;

class ItemController extends BaseController {

    public static function index () {

      $items = Item::all();

      

        self::loadView('/items', [
            'title' => 'Userspage',
            "items" => $items

        ]);
    }

    public static function addUser() {
        print_r($_POST);
    }

}