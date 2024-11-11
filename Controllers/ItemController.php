<?php

namespace App\Controllers;

use Item;
use User;


class ItemController extends BaseController {

    public static function index () {

      $items = Item::all();
      $users = User::all();

      

      

        self::loadView('items/items', [
            'title' => 'Userspage',
            "items" => $items,
            "users" => $users


        ]);
    }

    public static function GetOneItem() {
        $itemId = $_GET['id'] ?? null;
        $findItem = Item::find($itemId);
        $users = User::all();

        
        self::loadView('items/edit', [
            'title' => 'Edit item',
            'item' => $findItem,
            'users' => $users
        ]);
        }

    public static function editItem() {
            
            $itemId = $_POST['item_id'] ?? null;
        
            if (!$itemId) {
                echo "item ID not provided.";
                return;
            }
        
            
            $item = Item::find($itemId);
        
            if (!$item) {
                echo "item not found.";
                return;
            }
        
         
            $item->name = $_POST['name'];
            $item->description = $_POST['description'];
            $item->price = $_POST['price'];
            $item->available = $_POST['available'];
            $item->owner_id = $_POST['owner_id'];
        
           
            $success = $item->updateItem();
        
           
            if ($success) {
              
                header("Location: /items");
            } else {
                echo "Something went wrong.";
            }
        }

        public static function deleteItem() {
           
            $itemId = $_POST['item_id'] ?? null;
        
            if (!$itemId) {
                echo "item ID not provided.";
                return;
            }
        
      
            $item = Item::find($itemId);
        
            if (!$item) {
                echo "item not found.";
                return;
            }
        
          
            $success = $item->deleteItem();
        
            if ($success) {
                
                header("Location: /items");
                exit;
            } else {
                echo "Something went wrong.";
            }
        }

        public static function addItem() {
            
            $item = New Item();
            


            $item->name = $_POST['name'];
            $item->description = $_POST['description'];
            $item->available = $_POST['available'];
            $item->price = $_POST['price'];
            $item->owner_id = $_POST['owner_id'];

          

    
            $succes = $item->addItem();
           

            if($succes) {
                header("Location: /items");
            } else {
                echo 'Something went wrong';
            }
    
        }

        public static function search() {
            $query = $_GET['query'] ?? '';
            $items = Item::search($query);
            $users = User::all();
            
            self::loadView('items/items', [
                'title' => 'Search Results',
                'items' => $items,
                'users' => $users
            ]);
        }

        public static function filter() {
            $availability = $_GET['availability'] ?? '';
            if ($availability === '') {
                $items = Item::all();
            } else {
                $items = Item::filterByAvailability($availability);
            }
            $users = User::all();
            
            self::loadView('items/items', [
                'title' => 'Filtered Items',
                'items' => $items,
                'users' => $users
            ]);
        }
        


    
}