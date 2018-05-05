/* Set the width of the side navigation to 250px */
function openNav() {
    var sidenav = document.getElementById("byobtsm-sidenav-wrapper");
    var content = document.getElementById("byobtsm-content-wrapper");
    var overlay = document.getElementById('byobtsm-overlay');
    var button1 = document.getElementById('nav-icon1');
    var button2 = document.getElementById('nav-icon2');
    sidenav.classList.add('byobtsm-open');
    content.classList.add('byobtsm-open');
    overlay.classList.add('byobtsm-content-overlay');
    button1.classList.add('open');
    button2.classList.add('open');
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    var sidenav = document.getElementById("byobtsm-sidenav-wrapper");
    var content = document.getElementById("byobtsm-content-wrapper");
    var overlay = document.getElementById('byobtsm-overlay');
    var button1 = document.getElementById('nav-icon1');
    var button2 = document.getElementById('nav-icon2');
    sidenav.classList.remove('byobtsm-open');
    content.classList.remove('byobtsm-open');
    overlay.classList.remove('byobtsm-content-overlay');
    button1.classList.remove('open');
    button2.classList.remove('open');
}