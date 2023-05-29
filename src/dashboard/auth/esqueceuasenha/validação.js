function verificarSenha() {
  var senha = document.getElementById("senha").value;
  var confirmarSenha = document.getElementById("confirmarSenha").value;

  if (senha != confirmarSenha) {
    var aviso = document.getElementById("aviso");
    aviso.style.display = "block";
    event.preventDefault();
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
