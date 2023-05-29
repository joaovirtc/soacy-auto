function verificarSenha() {
  var senha = document.getElementById("senha").value;
  var confirmarSenha = document.getElementById("confirmarSenha").value;
  if (senha != confirmarSenha) {
    var aviso = document.getElementById("aviso");
    aviso.style.display = "block";
    event.preventDefault();
  }
}

const form = document.getElementById("form");
const campos = document.querySelectorAll(".requiredInput");
const spans = document.querySelectorAll(".span-required");

form.addEventListener("submit", (event) => {
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

function show() {
  var senha = document.getElementById("senha");
  var confirmarSenha = document.getElementById("confirmarSenha");
  if (senha.type && confirmarSenha.type === "password") {
    senha.type = "text";
    confirmarSenha.type = "text";
  } else {
    senha.type = "password";
    confirmarSenha.type = "password";
  }
}
