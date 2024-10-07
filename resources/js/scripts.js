// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    // const hideSidebar = document.body.querySelector('#layoutSidenav_outline');

    // hideSidebar.addEventListener('click', event => {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    //     localStorage.setItem('sb|sidebar-toggle', false);
    // });

    const sidebarToggle = document.body.querySelector('.sidebarToggle');
    if (sidebarToggle) {

        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    // toggle theme 
    const themeSwitcher = document.body.querySelector('#themeSwitcher');
    if (themeSwitcher) {
        if (localStorage.getItem('sb-themeswitcher') === 'light') {
            document.getElementById('sidenavAccordion').classList.toggle('sb-sidenav-light');
            themeSwitcher.classList.toggle('text-white');
        }
        themeSwitcher.addEventListener('click', event => {
            event.preventDefault();
            document.getElementById('sidenavAccordion').classList.toggle('sb-sidenav-light');
            themeSwitcher.classList.toggle('text-white');
            localStorage.setItem('sb-themeswitcher', localStorage.getItem('sb-themeswitcher') === 'light' ? 'dark' : 'light');
        });
    }

});
