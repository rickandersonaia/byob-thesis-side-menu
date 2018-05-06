function openNav() {
    var sidenav = document.getElementById("byobsm-sidenav-wrapper");
    var content = document.getElementById("byobsm-content-wrapper");
    var overlay = document.getElementById('byobsm-overlay');
    var button1 = document.getElementById('open-icon');
    var button2 = document.getElementById('close-icon');
    sidenav.classList.add('byobsm-open');
    content.classList.add('byobsm-open');
    overlay.classList.add('byobsm-content-overlay');
    button1.classList.add('open');
    button2.classList.add('open');
}

function closeNav() {
    var sidenav = document.getElementById("byobsm-sidenav-wrapper");
    var content = document.getElementById("byobsm-content-wrapper");
    var overlay = document.getElementById('byobsm-overlay');
    var button1 = document.getElementById('open-icon');
    var button2 = document.getElementById('close-icon');
    sidenav.classList.remove('byobsm-open');
    content.classList.remove('byobsm-open');
    overlay.classList.remove('byobsm-content-overlay');
    button1.classList.remove('open');
    button2.classList.remove('open');
}