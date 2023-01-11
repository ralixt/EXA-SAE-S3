// menu hamburger

const menuHamburger = document.querySelector(".menu-hamburger")
const menuHamburgerClose = document.querySelector(".menu-hamburger-close")
const navLinks = document.querySelector(".nav-links")
const bodyClass = document.querySelector(".bodyClass")


menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    bodyClass.classList.toggle('scroll')
    menuHamburger.classList.toggle('fermee')
    menuHamburgerClose.classList.toggle('fermee')
})

menuHamburgerClose.addEventListener('click', ()=>{
    navLinks.classList.remove('mobile-menu')
    bodyClass.classList.remove('scroll')
    menuHamburger.classList.remove('fermee')
    menuHamburgerClose.classList.remove('fermee')
})






