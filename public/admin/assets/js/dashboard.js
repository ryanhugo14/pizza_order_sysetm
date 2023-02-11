// sideBar
const sideBar = document.getElementById("sideBar");
const siderBarOpen = document.getElementById("siderBarOpen");
const siderBarClose = document.getElementById("siderBarClose");
const backgrounBlack = document.getElementById("backgrounBlack");

siderBarOpen.addEventListener("click", () => {
    sideBar.classList.remove("hidden");
    backgrounBlack.classList.remove("hidden");
    siderBarOpen.classList.add("hidden");
    siderBarClose.classList.remove("hidden");
});

siderBarClose.addEventListener("click", () => {
    sideBar.classList.add("hidden");
    backgrounBlack.classList.add("hidden");
    siderBarOpen.classList.remove("hidden");
    siderBarClose.classList.add("hidden");
});

// Dropdown Profile Menu
const dropDownIcon = document.getElementById("dropDownIcon");
const dropDownMenu = document.getElementById("dropDownMenu");

dropDownIcon.addEventListener("mouseenter", () => {
    dropDownMenu.classList.toggle("hidden");
});

dropDownIcon.addEventListener("mouseleave", () => {
    dropDownMenu.classList.toggle("hidden");
});

