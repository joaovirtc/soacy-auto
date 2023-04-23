const formBody = document.getElementById("formBody");
const campos = document.querySelectorAll(".requiredInput");
const spans = document.querySelectorAll(".span-required");
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

formBody.addEventListener("submit", (event) => {
  nameValidate();
  numeroValidate();
  emailValidate();

  function nameValidate() {
    if (campos[0].value.length < 1) {
      event.preventDefault();
      setError(0);
    } else {
      removeError(0);
    }
  }

  function numeroValidate() {
    if (campos[1].value.length <= 10) {
      setError(1);
    } else {
      removeError(1);
    }
  }

  function emailValidate() {
    if (!emailRegex.test(campos[2].value)) {
      setError(2);
    } else {
      removeError(2);
    }
  }
});

function setError(index) {
  campos[index].style.border = "1px solid red";
  spans[index].style.display = "block";
}
function removeError(index) {
  campos[index].style.border = "";
  spans[index].style.display = "none";
}

function nameValidate() {
  if (campos[0].value.length < 0) {
    setError(0);
  } else {
    removeError(0);
  }
}

function numeroValidate() {
  if (campos[1].value.length <= 0) {
    setError(1);
  } else {
    removeError(1);
  }
}

function emailValidate() {
  if (!emailRegex.test(campos[2].value)) {
    setError(2);
  } else {
    removeError(2);
  }
}

// PHONE
const handlePhone = (event) => {
  let input = event.target;
  input.value = phoneMask(input.value);
};

const phoneMask = (value) => {
  if (!value) return "";
  value = value.replace(/\D/g, "");
  value = value.replace(/(\d{2})(\d)/, "($1) $2");
  value = value.replace(/(\d)(\d{4})$/, "$1-$2");
  return value;
};
