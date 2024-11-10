


<div id="addItemOverlay" class="hidden">
  <div class="z-50 bg-black bg-opacity-25 backdrop-blur-lg fixed inset-0 flex items-center justify-center">
    <div class="">
      <form class="relative" action="/items/add" method="POST">
        <div class="flex flex-col gap-4 bg-white p-8 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold">Add Item</h2>
          <div class="flex flex-col gap-4">
            <label for="name">Item Name</label>
            <input type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex flex-col gap-4">
            <label for="description">Item Description</label>
            <textarea name="description" id="description" class="p-2 border border-gray-300 rounded-lg" required></textarea>
          </div>
          <div class="flex flex-col gap-4">
            <label for="available">Available</label>
            <select name="available" id="available" class="p-2 border border-gray-300 rounded-lg" required>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
          
            
            <div class="flex flex-col gap-4">
            <label for="price">Item Price</label>
            <input type="number" step="0.01" name="price" id="price" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex flex-col gap-4">
            <label for="owner_id">Owner</label>
            <select name="owner_id" id="owner_id" class="p-2 border border-gray-300 rounded-lg">
              <?php foreach($users as $index => $user): ?>
                <option value="<?= $user->user_id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>
              
              <?php endforeach; ?>
            </select>
          </div>
          <div class="flex gap-4">
            <input value="Add Item" type="submit" class="bg-blue-500 text-white p-2 rounded-lg"></input>
            <button type="button" id="closeAddItemOverlay" class="bg-red-500 text-white p-2 rounded-lg">Cancel</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>
</div>