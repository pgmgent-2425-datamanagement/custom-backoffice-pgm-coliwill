document.addEventListener("DOMContentLoaded", () => {
  const addItemOverlay = document.querySelector("#addItemButton");
  const closeItemOverlay = document.querySelector("#closeAddItemOverlay");

  addItemOverlay.addEventListener("click", () => {
    console.log("click");
    document.querySelector("#addItemOverlay").classList.remove("hidden");
  });

  closeItemOverlay.addEventListener("click", () => {
    document.querySelector("#addItemOverlay").classList.add("hidden");
    console.log("close");
  });
});
