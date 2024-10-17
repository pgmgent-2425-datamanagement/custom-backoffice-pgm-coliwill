document.addEventListener("DOMContentLoaded", () => {
  const userEntries = document.querySelectorAll("#usersTable > div > div");
  const editUserOverlay = document.querySelector("#editUserOverlay");
  const closeUserOverlay = document.querySelector("#closeUserOverlay");

  userEntries.forEach((entry) => {
    entry.addEventListener("click", () => {
      editUserOverlay.classList.remove("hidden");
    });
  });

  closeUserOverlay.addEventListener("click", () => {
    editUserOverlay.classList.add("hidden");
  });
});
