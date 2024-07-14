const menuBtn = document.querySelector('.sidebar__menu-button');
const menuLogo = document.querySelector('.dashboard__logo')
const sidebar = document.querySelector('.sidebar');

menuBtn.addEventListener('click', () => {
	sidebar.classList.toggle('sidebar--active');
});
menuLogo.addEventListener('click', () => {
	sidebar.classList.remove('sidebar--active');
});