const mainNav = document.querySelector('.main-nav');
const toggleNav = document.querySelector('.main-nav__toggle');

mainNav.classList.remove('main-nav--nojs');
toggleNav.addEventListener('click', () => {
    if (mainNav.classList.contains('main-nav--closed')) {
        mainNav.classList.remove('main-nav--closed');
        mainNav.classList.add('main-nav--opened');
    } else {
        mainNav.classList.add('main-nav--closed');
        mainNav.classList.remove('main-nav--opened');
    }
});


const price = document.querySelector('.price');
const rub = document.querySelector('.rub')

// price.addEventListener('click', () => {
//     price.textContent = 'million' + ' ' + rub.textContent;
// })
