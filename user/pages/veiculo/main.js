let popupForm = document.getElementById("popup-form");
function openPopupForm() {
  popupForm.classList.add("open-popup-form");

  let activeOpacity = document.getElementById("openFormActiveOpacity");
  activeOpacity.classList.toggle("activeBlur");
}
function closePopupForm() {
  popupForm.classList.remove("open-popup-form");
  let activeOpacity = document.getElementById("openFormActiveOpacity");
  activeOpacity.classList.remove("activeBlur");
}
