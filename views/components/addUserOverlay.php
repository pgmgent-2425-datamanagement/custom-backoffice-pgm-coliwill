<div id="addUserOverlay" class="hidden">
  <div class="z-50 bg-black bg-opacity-25 backdrop-blur-lg fixed inset-0 flex items-center justify-center">
    <div class="">
      <form class="relative" action="/users/add" method="POST">
        <div class="flex flex-col gap-4 bg-white p-8 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold">Add user</h2>
          <div class="flex flex-col gap-4">
            <label for="first_name">First name</label>
            <input type="text" placeholder="" name="first_name" id="first_name" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex flex-col gap-4">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex flex-col gap-4">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="p-2 border border-gray-300 rounded-lg" required>
          </div>
          <div class="flex gap-4">
            <input value="Add user" type="submit" class="bg-blue-500 text-white p-2 rounded-lg"></input>
            <button type="button" id="closeAddUserOverlay" class="bg-red-500 text-white p-2 rounded-lg">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>