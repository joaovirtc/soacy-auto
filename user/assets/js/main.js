const toggleBtn = document.querySelector(".toggle-btn-open");
const toggleBtnIcon = document.querySelector(".toggle-btn i ");
const dropDownMenu = document.querySelector(".dropdown-menu");

toggleBtn.onclick = () => {
  dropDownMenu.classList.toggle("open");
  const isOpen = dropDownMenu.classList.contains("open");
};

// ================= DROP FILTRO ===================

let dropdownFiltro = document.querySelector(".dropdownFiltro");
dropdownFiltro.onclick = function () {
  dropdownFiltro.classList.toggle("active");
};

function SHOW_TEXT_FILTRO(a) {
  document.querySelector(".nameOption").value = a;
}

let dropdownFiltro2 = document.querySelector(".dropdownFiltro-2");
dropdownFiltro2.onclick = function () {
  dropdownFiltro2.classList.toggle("active-2");
};

function SHOW_TEXT_FILTRO2(value) {
  document.querySelector(".nameOption-2").value = value;
}

let dropdownFiltroANO = document.querySelector(".dropdownFiltro-ANO");
dropdownFiltroANO.onclick = function () {
  dropdownFiltroANO.classList.toggle("active-ANO");
};

function SHOW_TEXT_FILTRO_ANO(valueANO) {
  document.querySelector(".nameOption-ANO").value = valueANO;
}
