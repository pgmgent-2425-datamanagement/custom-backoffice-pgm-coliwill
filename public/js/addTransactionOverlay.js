document.addEventListener("DOMContentLoaded", () => {
  const addTransactionOverlay = document.querySelector("#addTransactionButton");
  const closeTransactionOverlay = document.querySelector(
    "#closeAddTransactionOverlay"
  );

  addTransactionOverlay.addEventListener("click", () => {
    console.log("click");
    document.querySelector("#addTransactionOverlay").classList.remove("hidden");
  });

  closeTransactionOverlay.addEventListener("click", () => {
    document.querySelector("#addTransactionOverlay").classList.add("hidden");
    console.log("close");
  });

  const lenderSelect = document.getElementById("lender_id");
  const borrowerSelect = document.getElementById("borrower_id");
  const errorMessage = document.getElementById("error-message");
  const submitButton = document.getElementById("submitButton");

  function validateLenderBorrower() {
    if (lenderSelect.value === borrowerSelect.value) {
      errorMessage.classList.remove("hidden"); 
      submitButton.disabled = true; 
    } else {
      errorMessage.classList.add("hidden"); 
      submitButton.disabled = false; 
    }
  }

  
  lenderSelect.addEventListener("change", validateLenderBorrower);
  borrowerSelect.addEventListener("change", validateLenderBorrower);

  
  validateLenderBorrower();
});
