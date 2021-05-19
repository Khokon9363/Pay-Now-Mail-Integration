const form = document.getElementById("form");

const otp = document.getElementById("otp");

const processing_form = document.querySelector(".processing_form");
let hasErr = false;

form.addEventListener("submit", (e) => {
  e.preventDefault();

  checkInputs();

  if (otp.value) {
    processing_form.style.visibility = "visible";
    setTimeout(() => {
      alert("Send data to server. Thank you.");
    }, 3000);
    if (hasErr == true) {
      e.preventDefault();
    }
  }
});

function checkInputs() {
  // trim to remove the whitespaces
  const otpValue = otp.value.trim();

  if (otpValue === "") {
    hasErr = true
    setErrorFor(otp, "OTP cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(otp);
  }
}

function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  formControl.className = "form-control error";
  small.innerText = message;
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  formControl.className = "form-control success";
}
