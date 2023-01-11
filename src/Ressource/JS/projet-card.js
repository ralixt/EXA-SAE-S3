const swiper = new Swiper('.swiperCards', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    allowTouchMove: false,
    centeredSlides: true,

    autoplay: {
        delay:2000,
    },
});
const cards = document.querySelectorAll(".swiper")
if(swiper.length >1) {
    for (let sw of swiper) {
        sw.autoplay.stop()
        sw.el.parentElement.addEventListener("mouseenter", () => {
            sw.autoplay.start()
        })
        sw.el.parentElement.addEventListener("mouseleave", () => {
            sw.autoplay.stop()
        })
    }
}
else{
    swiper.autoplay.stop()
    swiper.el.parentElement.addEventListener("mouseenter", () => {
        swiper.autoplay.start()
    })
    swiper.el.parentElement.addEventListener("mouseleave", () => {
        swiper.autoplay.stop()
    })
}