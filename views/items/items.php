<div id="usersTable" class="flex justify-between w-full">
    <div class="flex flex-col w-full">
        <h2 class="font-bold">Item name</h2>
        <?php foreach($items as $index => $item): ?>
            <a href="/users/detail?id=<?= $item->item_id ?>">
                <div id="<?= $item->item_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $item->name ?></div>
            </a>
            
        <?php endforeach; ?>
    </div>
    
    <div class="flex flex-col w-full">
        <h2 class="font-bold">Price</h2>
        <?php foreach($items as $index => $item): ?>
            <a href="/users/detail?id=<?= $item->item_id ?>">
                <div id="<?= $item->item_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"> $<?= $item->price ?></div>
            </a>
        <?php endforeach; ?>
    </div>



    <div class="flex flex-col w-full">
      <h2 class="font-bold">Availability</h2>
      <?php foreach($items as $index => $item): ?>
        <a href="/users/detail?id=<?= $item->item_id ?>">
          <div id="<?= $item->item_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2">
            <span class="<?= $item->available ? 'text-green-500' : 'text-red-500' ?>">
              <?= $item->available ? 'Available' : 'Unavailable' ?>
            </span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="flex flex-col w-full">
    <h2 class="font-bold">Edit/Delete</h2>
    <?php foreach($items as $index => $item): ?>
        <div id="<?= $item->item_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2">
            <a class="bg-blue-500 px-2 rounded-md" href="/items/edit?id=<?=$item->item_id?>">Edit</a>

            <!-- Form for delete action -->
            <form action="/items/delete" method="POST" style="display:inline;">
                <input type="hidden" name="item_id" value="<?= $item->item_id ?>">
                <button type="submit" class="bg-red-500 px-2 rounded-md">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>


   

    
</div>
<button id="addUserButton" class="bg-blue-500 p-4 rounded-md">Add item</button>