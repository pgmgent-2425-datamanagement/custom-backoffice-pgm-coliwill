


<div id="addTransactionOverlay" class="hidden">
  <div class="z-50 bg-black bg-opacity-25 backdrop-blur-lg fixed inset-0 flex items-center justify-center">
    <div class="">
      <form class="relative" action="/transactions/add" method="POST">
        <div class="flex flex-col gap-4 bg-white p-8 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold">Add Transaction</h2>
          <div class="flex flex-col gap-4">
            <label for="lender_id">Lender</label>
            <select name="lender_id" id="lender_id" class="p-2 border border-gray-300 rounded-lg">
              <?php foreach($users as $user): ?>
                <option value="<?= $user->user_id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="flex flex-col gap-4">
            <label for="borrower_id">Borrower</label>
            <select name="borrower_id" id="borrower_id" class="p-2 border border-gray-300 rounded-lg">
              <?php foreach($users as $user): ?>
                <option value="<?= $user->user_id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="flex flex-col gap-4">
            <label for="lended_item_id">Lended item</label>
            <select name="lended_item_id" id="lended_item_id" class="p-2 border border-gray-300 rounded-lg">
              <?php foreach($items as $item): ?>
                <option value="<?= $item->item_id ?>"><?= $item->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="flex flex-col gap-4">
            <label for="start_date">Start date</label>
            <input type="date" name="start_date" id="start_date" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex flex-col gap-4">
            <label for="end_date">End date</label>
            <input type="date" name="end_date" id="end_date" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex flex-col gap-4">
            <label for="return_status">Return status</label>
            <select name="return_status" id="return_status" class="p-2 border border-gray-300 rounded-lg">
              <option value="canceled">Canceled</option>
              <option value="ongoing">Ongoing</option>
              <option value="completed">Completed</option>
            </select>
          </div>
          <p id="error-message" class="text-red-500 hidden">Lender and Borrower cannot be the same person.</p>
          </div>

          
          <div class="flex gap-4">
            <input value="Add Item" type="submit" class="bg-blue-500 text-white p-2 rounded-lg"></input>
            <button type="button" id="closeAddTransactionOverlay" class="bg-red-500 text-white p-2 rounded-lg">Cancel</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>
</div>