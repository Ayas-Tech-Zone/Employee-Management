function checkForSpace(event) {
  // Get the entered value
  var enteredText = event.target.value;

  // Check if the entered value contains a space
  if (enteredText.includes(" ")) {
    // Display alert
    alert("Space is not allowed to entered!");

    // Empty the input field
    event.target.value = "";
  }
}

// Listen to input event for typing
document
  .getElementById("inputField1")
  .addEventListener("input", function (event) {
    checkForSpace(event);
  });

document
  .getElementById("inputField2")
  .addEventListener("input", function (event) {
    checkForSpace(event);
  });

// Listen to paste event for pasting
document
  .getElementById("inputField1")
  .addEventListener("paste", function (event) {
    setTimeout(function () {
      checkForSpace(event);
    }, 0);
  });

document
  .getElementById("inputField2")
  .addEventListener("paste", function (event) {
    setTimeout(function () {
      checkForSpace(event);
    }, 0);
  });