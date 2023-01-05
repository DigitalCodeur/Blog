
const onClickMenu = function () {
    const navMenu = document.querySelector(".nav-menu");
    navMenu.classList.toggle('hidden');
}


const menu = document.getElementById('click-menu');

menu.addEventListener('click', onClickMenu);