const toggleBtn = document.querySelector(".toggle-btn-open");
const toggleBtnIcon = document.querySelector(".toggle-btn i ");
const dropDownMenu = document.querySelector(".dropdown-menu");

toggleBtn.onclick = () => {
  dropDownMenu.classList.toggle("open");
  const isOpen = dropDownMenu.classList.contains("open");
};
