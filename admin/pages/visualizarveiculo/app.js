let popupForm = document.getElementById("popup-aviso");
function openPopup() {
  popupForm.classList.add("open-popup-aviso");

  let activeOpacity = document.getElementById("openFormActiveOpacity");
  activeOpacity.classList.toggle("activeBlur");
}
function closePopup() {
  popupForm.classList.remove("open-popup-aviso");
  let activeOpacity = document.getElementById("openFormActiveOpacity");
  activeOpacity.classList.remove("activeBlur");
}
