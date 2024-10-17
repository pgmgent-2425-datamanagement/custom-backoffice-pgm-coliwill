document.addEventListener("DOMContentLoaded", () => {
  const addUserOverlay = document.querySelector("#addUserButton");
  const closeUserOverlay = document.querySelector("#closeAddUserOverlay");

  addUserOverlay.addEventListener("click", () => {
    console.log("click");
    document.querySelector("#addUserOverlay").classList.remove("hidden");
  });

  closeUserOverlay.addEventListener("click", () => {
    document.querySelector("#addUserOverlay").classList.add("hidden");
    console.log("close");
  });
});
