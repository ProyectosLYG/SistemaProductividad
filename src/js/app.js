document.addEventListener('DOMContentLoaded', function(){
    menuHamb();
});
function menuHamb (){
    const nav = document.querySelector('.mobile-menu');
    nav.addEventListener('click', mostrarNav);
}
function mostrarNav(){
    const nav = document.querySelector('.enlaces');
    nav.classList.toggle('mostrar');
    
}