const formLogin = document.getElementById("formLogin");
const campos = document.querySelectorAll(".requiredInput");
const spans = document.querySelectorAll(".span-required");

formLogin.addEventListener("submit", (event) => {
  nameValidate();
  passwordValidate();

  function nameValidate() {
    if (campos[0].value.length < 1) {
      event.preventDefault();
      setError(0);
    } else {
      removeError(0);
    }
  }

  // function passwordValidate() {
  //   if (campos[1].value.length < 5) {
  //     setError(1);
  //   } else {
  //     removeError(1);
  //   }
  // }
});

function setError(index) {
  campos[index].style.border = "1px solid #F30D0D";
  spans[index].style.display = "block";

}

function removeError(index) {
  campos[index].style.border = "";
  spans[index].style.display = "";
}

function nameValidate() {
  if (campos[0].value.length < 1) {
    setError(0);
  } else {
    removeError(0);
  }
}

// function passwordValidate() {
//   if (campos[1].value.length <= 0) {
//     setError(1);
//   } else {
//     removeError(1);
//   }
// }
