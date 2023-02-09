document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper('.swiper', {
        loop: apBlocksSliderConfig.loop,
        slidesPerView: apBlocksSliderConfig.slidesPerView,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});