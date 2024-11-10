<div class="container mx-auto mt-10">
    <div class="max-w-4xl mx-auto bg-white p-5 rounded-md shadow-sm">
        <h2 class="text-2xl font-bold mb-5">Items</h2>
        
        <!-- Search Form -->
        <form action="/items/search" method="GET" class="mb-5">
            <input type="text" name="query" placeholder="Search items..." class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-2">Search</button>
        </form>

        <form action="/items/filter" method="GET" class="mb-5">
            <label for="availability" class="block text-gray-700">Filter by Availability</label>
            <select name="availability" id="availability" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All</option>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-2">Filter</button>
        </form>

        

        
        
        <div id="itemsTable" class="flex justify-between w-full">
            <div class="flex flex-col w-full">
                <h2 class="font-bold">Item name</h2>
                <?php foreach($items as $index => $item): ?>
                    <a href="/items/detail?id=<?= $item->item_id ?>">
                        <div id="<?= $item->item_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $item->name ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <div class="flex flex-col w-full">
                <h2 class="font-bold">Price</h2>
                <?php foreach($items as $index => $item): ?>
                    <a href="/items/detail?id=<?= $item->item_id ?>">
                        <div id="<?= $item->item_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"> $<?= $item->price ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <div class="flex flex-col w-full">
                <h2 class="font-bold">Availability</h2>
                <?php foreach($items as $index => $item): ?>
                    <a href="/items/detail?id=<?= $item->item_id ?>">
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
        
        <button id="addItemButton" class="bg-blue-500 p-4 rounded-md">Add item</button>
        <?php include __DIR__ . '/../components/addItemOverlay.php'; ?>
        <script src="../js/addItemOverlay.js"></script>
    </div>
</div>