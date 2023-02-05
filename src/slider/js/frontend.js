document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper('.swiper', {
        loop: false,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});