function toggleSidebar() {
    var sidenav = document.getElementById('sidenav');
    if (sidenav.style.left === '0px') {
        sidenav.style.left = '-250px';
    } else {
        sidenav.style.left = '0px';
    }
}