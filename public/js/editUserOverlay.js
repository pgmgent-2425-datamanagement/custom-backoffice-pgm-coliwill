document.addEventListener("DOMContentLoaded", () => {
  const editUserButton = document.querySelector(".editUser");
  const editUserOverlay = document.querySelector("#editUserOverlay");
  const closeUserOverlay = document.querySelector("#closeUserOverlay");

  const inputFirstName = document.querySelector("#first_name");
  const inputLastName = document.querySelector("#last_name");
  const inputEmail = document.querySelector("#email");

  const firstName = editUserButton.getAttribute("data-first-name");
  const lastName = editUserButton.getAttribute("data-last-name");
  const email = editUserButton.getAttribute("data-email");

  editUserButton.addEventListener("click", () => {
    editUserOverlay.classList.remove("hidden");
    console.log(firstName);
    inputFirstName.value = firstName;
    inputLastName.value = lastName;
    inputEmail.value = email;
  });

  closeUserOverlay.addEventListener("click", () => {
    editUserOverlay.classList.add("hidden");
  });
});
