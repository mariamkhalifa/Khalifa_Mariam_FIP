(function (){

let aboutImg = document.querySelector('.about-img');

function swapImg1() {
    aboutImg.src = "images/mariam2.jpg";
    gsap.from(aboutImg, {opacity: .5, scale: 1.2, duration: 3, ease: 'power4'});
    gsap.to(aboutImg, {opacity: 1, scale: 1, duration: 3, ease: 'power4'});
}

function swapImg2() {
    aboutImg.src = "images/mariam1.jpg";
    gsap.from(aboutImg, {opacity: .5, scale: 1.2, duration: 3, ease: 'power4'});
    gsap.to(aboutImg, {opacity: 1, scale: 1, duration: 3, ease: 'power4'});
}

aboutImg.addEventListener('mouseover', swapImg1);
aboutImg.addEventListener('mouseleave', swapImg2);

})();