<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="max-w-4xl mx-auto bg-white p-5 rounded-md shadow-sm">
            
        <?php if ($userImage): ?>
    <img src="../<?= $userImage->path ?>" alt="User Image" class="w-32 h-32 rounded-full">
    
<?php else: ?>
    <p>No image uploaded.</p>
<?php endif; ?>
            <h2 class="text-2xl font-bold mb-5"><?= $user->first_name ?> <?= $user->last_name ?></h2>
            <p>Email: <?= $user->email ?></p>

         
            <h3 class="text-xl font-semibold mt-5">Items Owned</h3>
            <ul>
                <?php foreach ($itemsOwned as $item): ?>
                    <li><?= $item->name ?> - <?= $item->description ?> ($<?= $item->price ?>)</li>
                <?php endforeach; ?>
            </ul>

          
            <h3 class="text-xl font-semibold mt-5">Items Borrowed</h3>
            <ul>
                <?php foreach ($itemsBorrowed as $item): ?>
                    <li>
                        <?= $item->item_name ?> from <?= $item->lender_first_name ?> <?= $item->lender_last_name ?> 
                        (Status: <?= $item->return_status ?>, Due: <?= $item->end_date ?>)
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Items Lent by User -->
            <h3 class="text-xl font-semibold mt-5">Items Lent</h3>
            <ul>
                <?php foreach ($itemsLent as $item): ?>
                    <li>
                        <?= $item->item_name ?> to <?= $item->borrower_first_name ?> <?= $item->borrower_last_name ?> 
                        (Status: <?= $item->return_status ?>, Due: <?= $item->end_date ?>)
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Reviews Given -->
            <h3 class="text-xl font-semibold mt-5">Reviews Given</h3>
            <ul>
                <?php foreach ($reviewsGiven as $review): ?>
                    <li>
                        <?= $review->rating ?>/5 for <?= $review->item_name ?> - <?= $review->comment ?> 
                        (Lender: <?= $review->lender_first_name ?> <?= $review->lender_last_name ?>)
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Reviews Received -->
            <h3 class="text-xl font-semibold mt-5">Reviews Received</h3>
            <ul>
                <?php foreach ($reviewsReceived as $review): ?>
                    <li>
                        <?= $review->rating ?>/5 for <?= $review->item_name ?> - <?= $review->comment ?> 
                        (Borrower: <?= $review->borrower_first_name ?> <?= $review->borrower_last_name ?>)
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</body>
</html>
