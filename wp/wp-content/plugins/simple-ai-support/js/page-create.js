const targets = document.querySelectorAll(".sas-chat .tooltip-icon");
const tooltips = document.querySelectorAll(".sas-chat [role='tooltip']");
let isShow = Array(targets.length).fill(false);

function showTooltip(index) {
  tooltips[index].style.visibility = "visible";
  isShow[index] = true;
}

function hiddenTooltip(index) {
  tooltips[index].style.visibility = "hidden";
  isShow[index] = false;
}

// Keydown
window.addEventListener("keydown", (event) => {
  if (event.key === "Escape") {
    isShow.forEach((show, index) => {
      if (show) {
        hiddenTooltip(index);
      }
    });
  }
});

// Apply event listeners to all elements
targets.forEach((target, index) => {
  // Mouse Over
  target.onmouseover = () => showTooltip(index);

  // Mouse Leave
  target.onmouseleave = () => hiddenTooltip(index);

  // Focus
  target.onfocus = () => showTooltip(index);

  // Blur
  target.onblur = () => hiddenTooltip(index);
});
