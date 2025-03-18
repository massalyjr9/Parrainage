document.addEventListener('DOMContentLoaded', function() {
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.querySelector('#menu_bar');
    const closeBtn = document.querySelector('#close_btn');
    const themeToggler = document.querySelector('.theme-toggler');

    if (menuBtn) {
        menuBtn.addEventListener('click', () => {
            if (sideMenu) {
                sideMenu.style.display = "block";
            }
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            if (sideMenu) {
                sideMenu.style.display = "none";
            }
        });
    }

    if (themeToggler) {
        themeToggler.addEventListener('click', () => {
            document.body.classList.toggle('dark-theme-variables');
            themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
            themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
        });
    }
});