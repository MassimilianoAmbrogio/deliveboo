const openSidebar = document.querySelector('.open-sidebar');
const sidebar = document.querySelector('.admin-sidebar');

openSidebar.addEventListener('click', () => {
  sidebar.classList.toggle('mobile-sidebar');
  openSidebar.classList.toggle('close-opener');
});