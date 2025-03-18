/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
     navToggle = document.getElementById('nav-toggle'),
     navClose = document.getElementById('nav-close')

/*=============== MENU SHOW ===============*/
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/*=============== MENU HIDDEN ===============*/
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

const linkAction = () =>{
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== ADD BLUR TO HEADER ===============*/
const blurHeader = () =>{
    const header = document.getElementById('header')
    this.scrollY >= 50 ? header.classList.add('blur-header')
                        : header.classList.remove('blur-header')
}
window.addEventListener('scroll', blurHeader)

/*=============== WRAPPER ===============*/
/*const readMoreButtons = document.querySelectorAll(".btn");

readMoreButtons.forEach(item => {
    item.addEventListener("click", () => {
        const box = item.closest(".box");
        const readMoreText = box.querySelector(".text");

        if(readMoreText.style.maxHeight) {
            readMoreText.style.maxHeight = null;
            item.textContent = "ReadMore";
            item.style.backgroundColor = "#3498db"
        } else{
            readMoreText.style.maxHeight = readMoreText.
            scrollHeight + "px";
            item.textContent = "Read Less";
            item.style.backgroundColor = "#e74c3c";
        }
    });
});*/
/*$(".readmore-btn").on('click', function(){
    $(this).parent().toggleClass("showContent");


    var replaceText = $(this).parent().hasClass("showContent") ? "Read Less" : "Read More";
    $(this).text(replaceText);
});*/

/*=============== SHOW SCROLL UP ===============*/
const scrollUp = () =>{
    const scrollUp = document.getElementById('scrollUp')
    this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
                        : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

const scrollActive = () =>{
    const scrollY = window.pageYOffset
    
    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight,
              sectionTop = current.offsetTop - 58,
              sectionId = current.getAttribute('id'),
              sectionsClass = document.querySelector('.nav__menu a[href*=' + sectionId + ']')
      
        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
          sectionsClass.classList.add('active-link')
        }else{
          sectionsClass.classList.remove('active-link')
        }
      })
}      
window.addEventListener('scroll', scrollActive)

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: '3000',
    delay: 400,
})

sr.reveal(`.home__data, .explore__data, .footer__container`)
sr.reveal(`.home__card`, {delay: 600, distance: '100px', interval: 100})
sr.reveal(`.about__data`, {origin: 'right'})
sr.reveal(`.about__image`, {origin: 'left'})
sr.reveal(`.popular__card`, {interval: 200})