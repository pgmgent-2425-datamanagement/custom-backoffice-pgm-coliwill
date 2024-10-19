<div id="usersTable" class="flex justify-between w-full">
    <div class="flex flex-col w-full">
        <h2 class="font-bold">First name</h2>
        <?php foreach($users as $index => $user): ?>
            <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $user->first_name ?></div>
        <?php endforeach; ?>
    </div>
    <div class="flex flex-col w-full">
        <h2 class="font-bold">Last name</h2>
        <?php foreach($users as $index => $user): ?>
            <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $user->last_name ?></div>
        <?php endforeach; ?>
    </div>
    <div class="flex flex-col w-full">
        <h2 class="font-bold">Email</h2>
        <?php foreach($users as $index => $user): ?>
            <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2"><?= $user->email ?></div>
        <?php endforeach; ?>
    </div>

    <div class="flex flex-col w-full">
        <h2 class="font-bold">Email</h2>
        <?php foreach($users as $index => $user): ?>
            <div id="<?= $user->user_id ?>" class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-200' ?> w-full my-2">
                <button data-user-id="<?= $user->user_id ?>" data-first-name="<?= $user->first_name ?>" data-last-name="<?= $user->last_name ?>" data-email="<?= $user->email ?>" class="editUser bg-blue-500 px-2 rounded-md">Edit</button>
                <button class="deleteUser bg-red-500 px-2 rounded-md">Delete</button>
            </div>
        <?php endforeach; ?>
    </div>

   

    
</div>
<button id="addUserButton" class="bg-blue-500 p-4 rounded-md">Add user</button>

<?php include "components/editUserOverlay.php" ?>
<?php include "components/addUserOverlay.php" ?>


<script src="/js/editUserOverlay.js"></script>
<script src="/js/addUserOverlay.js"></script>
