<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Transaction</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-sm">
      <h2 class="text-2xl font-bold mb-5">Edit Transaction</h2>
      
      <!-- Edit Transaction Form -->
      <form action="/transactions/edit" method="POST">
        <input type="hidden" name="transaction_id" value="<?= $transaction->transaction_id ?>">

        <!-- Lender Selection -->
        <div class="mb-4">
          <label for="lender_id" class="block text-gray-700">Lender</label>
          <select id="lender_id" name="lender_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <?php foreach($users as $user): ?>
              <option value="<?= $user->user_id ?>" <?= $transaction->lender_id == $user->user_id ? 'selected' : '' ?>>
                <?= $user->first_name ?> <?= $user->last_name ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Borrower Selection -->
        <div class="mb-4">
          <label for="borrower_id" class="block text-gray-700">Borrower</label>
          <select id="borrower_id" name="borrower_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <?php foreach($users as $user): ?>
              <option value="<?= $user->user_id ?>" <?= $transaction->borrower_id == $user->user_id ? 'selected' : '' ?>>
                <?= $user->first_name ?> <?= $user->last_name ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Item Selection -->
        <div class="mb-4">
          <label for="lended_item_id" class="block text-gray-700">Item</label>
          <select id="lended_item_id" name="lended_item_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <?php foreach($items as $item): ?>
              <option value="<?= $item->item_id ?>">
                <?= $item->name ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Start Date -->
        <div class="mb-4">
          <label for="start_date" class="block text-gray-700">Start Date</label>
          <input type="date" id="start_date" name="start_date" value="<?= $transaction->start_date ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- End Date -->
        <div class="mb-4">
          <label for="end_date" class="block text-gray-700">End Date</label>
          <input type="date" id="end_date" name="end_date" value="<?= $transaction->end_date ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Return Status -->
        <div class="mb-4">
          <label for="return_status" class="block text-gray-700">Return Status</label>
          <select id="return_status" name="return_status" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="canceled" <?= $transaction->return_status == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
            <option value="ongoing" <?= $transaction->return_status == 'Ongoing' ? 'selected' : '' ?>>Ongoing</option>
            <option value="completed" <?= $transaction->return_status == 'Completed' ? 'selected' : '' ?>>Completed</option>
          </select>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
        </div>
      </form>

    </div>
  </div>
</body>
</html>
