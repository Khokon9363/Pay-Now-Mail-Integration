const form = document.getElementById("form");

const mailid = document.getElementById("mailid");
const mobilenumber = document.getElementById("mobilenumber");
const productcode = document.getElementById("productcode");
const processing_form = document.querySelector(".processing_form");
let hasErr = false;

form.addEventListener("submit", (e) => {
  // e.preventDefault();

  checkInputs();

  if (mailid.value && mobilenumber.value && productcode.value) {
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
  const mailidValue = mailid.value.trim();
  const mobilenumberValue = mobilenumber.value.trim();
  const productcodeValue = productcode.value.trim();

  if (mailidValue === "") {
    hasErr = true
    setErrorFor(mailid, "Mail Id");
  } else {
    hasErr = false
    setSuccessFor(mailid);
  }
  if (mobilenumberValue === "") {
    hasErr = true
    setErrorFor(mobilenumber, "Mobile Number cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(mobilenumber);
  }
  if (productcodeValue === "") {
    hasErr = true
    setErrorFor(productcode, "Product Code cannot be blank");
  } else {
    hasErr = false
    setSuccessFor(productcode);
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
