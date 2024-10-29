<div id="usersTable" class="flex justify-between w-full">
    <div class="flex flex-col w-full">
        <h2 class="font-bold">First name</h2>
        <?php foreach($users as $index => $user): ?>
            <a href="/users/detail?id=<?= $user->user_id ?>">
                <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $user->first_name ?></div>
            </a>
            
        <?php endforeach; ?>
    </div>
    <div class="flex flex-col w-full">
        <h2 class="font-bold">Last name</h2>
        <?php foreach($users as $index => $user): ?>
            <a href="/users/detail?id=<?= $user->user_id ?>">
                <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $user->last_name ?></div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="flex flex-col w-full">
        <h2 class="font-bold">Email</h2>
        <?php foreach($users as $index => $user): ?>
            <a href="/users/detail?id=<?= $user->user_id ?>">
                <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $user->email ?></div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="flex flex-col w-full">
    <h2 class="font-bold">Edit/Delete</h2>
    <?php foreach($users as $index => $user): ?>
        <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2">
            <a class="bg-blue-500 px-2 rounded-md" href="/users/edit?id=<?=$user->user_id?>">Edit</a>

            <!-- Form for delete action -->
            <form action="/users/delete" method="POST" style="display:inline;">
                <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                <button type="submit" class="bg-red-500 px-2 rounded-md">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>


   

    
</div>
<button id="addUserButton" class="bg-blue-500 p-4 rounded-md">Add user</button>


<?php include __DIR__ . '/../components/addUserOverlay.php'; ?>



<script src="../js/addUserOverlay.js"></script>
