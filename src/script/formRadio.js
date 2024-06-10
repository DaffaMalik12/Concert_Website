  const radios = document.querySelectorAll('input[name="payment_method"]');
  const numberInputContainer = document.getElementById("numberInputContainer");

  radios.forEach((radio) => {
    radio.addEventListener("change", () => {
      if (radio.checked) {
        numberInputContainer.style.display = "block";
      } else {
        numberInputContainer.style.display = "none";
      }
    });
  });
