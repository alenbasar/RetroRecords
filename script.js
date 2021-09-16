const menuIcon = document.querySelector('.hamburger-menu');
const navbar = document.querySelector('.mobileMenu');
const line1 = document.querySelector('.line-1');
const line2 = document.querySelector('.line-2');
const line3 = document.querySelector('.line-3');

menuIcon.addEventListener('click', () => {
  line1.classList.toggle('change1');
  line2.classList.toggle('change2');
  line3.classList.toggle('change3');
  navbar.classList.toggle('change');
});
