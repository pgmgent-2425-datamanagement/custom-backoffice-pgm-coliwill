<div>
  <?php foreach($transactions as $index => $transaction): ?>
    <div class="border border-gray-300 p-6 my-6 rounded-lg shadow-lg bg-white max-w-md mx-auto hover:shadow-xl transition-shadow duration-200">
      
      <!-- Lender and Borrower Information -->
      <div class="flex justify-between items-center mb-4">
        <div>
          <p class="text-xl font-semibold text-gray-700">
            Lender: <span class="font-normal text-gray-600"><?= $transaction->lender_first_name ?> <?= $transaction->lender_last_name ?></span>
          </p>
        </div>
        <div>
          <p class="text-xl font-semibold text-gray-700">
            Borrower: <span class="font-normal text-gray-600"><?= $transaction->borrower_first_name ?> <?= $transaction->borrower_last_name ?></span>
          </p>
        </div>
      </div>

      <!-- Item Information -->
      <div class="mb-4">
        <p class="text-lg font-semibold text-gray-700">
          Item: <span class="font-normal text-gray-600"><?= $transaction->item_name ?></span>
        </p>
      </div>

      <!-- Start and End Dates -->
      <div class="flex justify-between mb-4">
        <p class="text-md font-semibold text-gray-700">
          Start date: <span class="font-normal text-gray-600"><?= $transaction->start_date ?></span>
        </p>
        <p class="text-md font-semibold text-gray-700">
          End date: <span class="font-normal text-gray-600"><?= $transaction->end_date ?></span>
        </p>
      </div>

      <!-- Return Status -->
      <div class="mb-4">
        <p class="text-md font-semibold text-gray-700">
          Return status: <span class="font-normal text-gray-600"><?= $transaction->return_status ?></span>
        </p>
      </div>
      
      <!-- Action Buttons -->
      <div class="flex justify-end space-x-4 mt-6">
        <a class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-150" href="/transactions/edit?id=<?=$transaction->transaction_id?>">Edit</a>
        <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-150">Delete</button>
      </div>

    </div>
  <?php endforeach; ?>

  <!-- Centered Add Transaction Button -->
  <div class="flex justify-center">
    <button id="addTransactionButton" class=" bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-150">
      Add transaction
    </button>
  </div>
</div>

<?php include __DIR__ . '/../components/addTransactionOverlay.php'; ?>

<script src="../js/addTransactionOverlay.js"></script>
