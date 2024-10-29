<?php

namespace App\Controllers;

use Item;

class ItemController extends BaseController {

    public static function index () {

      $items = Item::all();

      

      

        self::loadView('items/items', [
            'title' => 'Userspage',
            "items" => $items

        ]);
    }

    public static function GetOneItem() {
        $itemId = $_GET['id'] ?? null;
        $findItem = Item::find($itemId);
        
        self::loadView('items/edit', [
            'title' => 'Edit item',
            'item' => $findItem
        ]);
        }

    public static function editItem() {
            // Get the item ID from the form (or URL if needed)
            $itemId = $_POST['item_id'] ?? null;
        
            if (!$itemId) {
                echo "item ID not provided.";
                return;
            }
        
            // Fetch the item from the database
            $item = Item::find($itemId);
        
            if (!$item) {
                echo "item not found.";
                return;
            }
        
            // Update the item object with form data
            $item->name = $_POST['name'];
            $item->description = $_POST['description'];
            $item->price = $_POST['price'];
            $item->available = $_POST['available'];
        
            // Save the updated item to the database
            $success = $item->updateItem();
        
            // Check if the update was successful
            if ($success) {
                // Redirect to the users page after success
                header("Location: /items");
            } else {
                echo "Something went wrong.";
            }
        }

    
}