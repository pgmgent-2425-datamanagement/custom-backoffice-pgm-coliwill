

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-sm">
      <h2 class="text-2xl font-bold mb-5">Edit User</h2>
      <form action="/users/edit" method="POST">
    <!-- Hidden field to pass user_id -->
    <input type="hidden" name="user_id" value="<?= $user->user_id ?>">

    <div class="mb-4">
        <label for="first_name" class="block text-gray-700">First Name</label>
        <input value="<?= $user->first_name ?>" type="text" id="first_name" name="first_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="last_name" class="block text-gray-700">Last Name</label>
        <input value="<?= $user->last_name ?>" type="text" id="last_name" name="last_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input value="<?= $user->email ?>" type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
    </div>
</form>


      
    </div>
  </div>
</body>
</html>