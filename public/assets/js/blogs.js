const toggleButton = document.getElementById("toggleContainerBtn");
const topContainer = document.getElementById("topContainer");
const topContainerContent = document.querySelector(".top-container-content");
const closeTopContainer = document.getElementById("closeTopContainer");
const mainContainer = document.querySelector(".main-container");

// Calculate the full height of the hidden container content
function getFullHeight(element) {
  return element.scrollHeight + "px";
}

// Function to handle hiding/showing of the main container
function updateMainContainerVisibility() {
  if (topContainer.style.maxHeight === "0px") {
    mainContainer.style.display = "block"; // Show the main container when collapsed
  } else {
    mainContainer.style.display = "none"; // Hide the main container when expanded
  }
}

// Event listener for transition end to update visibility
topContainer.addEventListener("transitionend", updateMainContainerVisibility);

toggleButton.addEventListener("click", function (e) {
  e.preventDefault(); // Prevent default anchor behavior

  if (
    topContainer.style.maxHeight === "0px" ||
    topContainer.style.maxHeight === ""
  ) {
    // If the container is collapsed, expand it
    topContainer.style.maxHeight = getFullHeight(topContainerContent);
  } else {
    // Collapse the container back
    topContainer.style.maxHeight = "0px";
  }
});

closeTopContainer.addEventListener("click", function () {
  topContainer.style.maxHeight = "0px"; // Collapse the container
});
