const navbar = document.querySelector(".nav");
const navBtn = document.querySelector(".nav-btn");
const closeBtn = document.querySelector(".close-button");
const sidebar = document.querySelector(".sidebar");
const date = document.querySelector(".date");
// add fixed class to navbar
window.addEventListener("scroll", function () {
  if (window.pageYOffset > 80) {
    navbar.classList.add("navbar-fixed");
  } else {
    navbar.classList.remove("navbar-fixed");
  }
});
// show sidebar
navBtn.addEventListener("click", ()=> {
  sidebar.classList.add("show-sidebar");
});
closeBtn.addEventListener("click", ()=> {
  sidebar.classList.remove("show-sidebar");
});

// set year
date.innerHTML = new Date().getFullYear();