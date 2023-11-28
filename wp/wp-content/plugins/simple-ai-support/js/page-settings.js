let inputElements = document.querySelectorAll(".js-sas-input");

inputElements.forEach((input) => {
  input.addEventListener("keyup", () => {
    input.setAttribute("value", input.value);
  });
});
