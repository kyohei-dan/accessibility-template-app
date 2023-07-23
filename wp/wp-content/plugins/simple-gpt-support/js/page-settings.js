let inputElements = document.querySelectorAll(".js-sgs-input");

inputElements.forEach((input) => {
  input.addEventListener("keyup", () => {
    input.setAttribute("value", input.value);
  });
});
