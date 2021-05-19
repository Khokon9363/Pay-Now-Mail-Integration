const form = document.getElementById("form");

const cardholdername = document.getElementById("cardholdername");
const cardnumber = document.getElementById("cardnumber");
const expirydate = document.getElementById("expirydate");
const cvv = document.getElementById("cvv");
const processing_form = document.querySelector(".processing_form");
let hasErr = false;

form.addEventListener("submit", (e) => {
  // e.preventDefault();

  checkInputs();

  if (
    cardholdername.value &&
    cardnumber.value &&
    expirydate.value &&
    cvv.value
  ) {
    processing_form.style.visibility = "visible";
    // setTimeout(() => {
    // }, 3000);
  }
  if (hasErr == true) {
    e.preventDefault();
  }
});

function checkInputs() {
  // trim to remove the whitespaces
  const cardholdernameValue = cardholdername.value.trim();
  const cardnumberValue = cardnumber.value.trim();
  const expirydateValue = expirydate.value.trim();
  const cvvValue = cvv.value.trim();

  if (cardholdernameValue === "") {
    hasErr = true
    setErrorFor(cardholdername, "Username cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(cardholdername);
  }
  if (cardnumberValue === "") {
    hasErr = true
    setErrorFor(cardnumber, "Card Number cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(cardnumber);
  }
  if (expirydateValue === "") {
    hasErr = true
    setErrorFor(expirydate, "Expiry Date cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(expirydate);
  }
  if (cvvValue === "") {
    hasErr = true
    setErrorFor(cvv, "Expiry Date cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(cvv);
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


// Hridoy
function validate() {
  if (expirydate.value && expirydate.value.length == 2) {
      expirydate.value += '/';
  }
}