

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit item</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-sm">
      <h2 class="text-2xl font-bold mb-5">Edit Item</h2>
      



      <form action="/items/edit" method="POST">
 
    <input type="hidden" name="item_id" value="<?= $item->item_id ?>">

    <div class="mb-4">
        <label for="first_name" class="block text-gray-700">Item Name</label>
        <input value="<?= $item->name ?>" type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700">Description</label>
        <input value="<?= $item->description ?>" type="text" id="description" name="description" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700">price</label>
        <input value="<?= $item->price ?>" type="price" id="price" name="price" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
      <label for="available" class="block text-gray-700">Available</label>
      <select id="available" name="available" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <option value = 1 <?= $item->available == 'yes' ? 'selected' : '' ?>>Yes</option>
        <option value= 0 <?= $item->available == 'no' ? 'selected' : '' ?>>No</option>
      </select>
    </div>

    <div class="mb-4">
      <label for="owner_id" class="block text-gray-700">Owner</label>
      <select id="owner_id" name="owner_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <?php foreach($users as $user): ?>
          <option value="<?= $user->user_id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>
        <?php endforeach; ?>
      </select>



    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
    </div>
</form>


      
    </div>
  </div>
</body>
</html>