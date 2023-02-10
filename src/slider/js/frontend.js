document.addEventListener("DOMContentLoaded", function() {
    let pagination = false;
    let navigation = false;

    // Check if pagination is enabled.
    if (apBlocksSliderConfig.pagination == true) {
        pagination = {
            el: '.swiper-pagination',
        };
    }

    // Check if navigation is enabled.
    if (apBlocksSliderConfig.navigation == true) {
        navigation = {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        };
    }

    const swiper = new Swiper('.swiper', {
        loop: apBlocksSliderConfig.loop,
        slidesPerView: apBlocksSliderConfig.slidesPerView,
        spaceBetween: apBlocksSliderConfig.spaceBetween,
        pagination: pagination,
        navigation: navigation,
    });
});