var nav = document.querySelector('nav');
var toggler = document.querySelector('.navbar-toggler');

window.addEventListener('scroll', function() {
    if (window.pageYOffset > 5) {
        nav.classList.add("navbar-scroll");
    } 
    else {
        nav.classList.remove("navbar-scroll");
    }
})

toggler.onclick = function() {
    toggler.classList.toggle('active');
    nav.classList.toggle('active');
}
