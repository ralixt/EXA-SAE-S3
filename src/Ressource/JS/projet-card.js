const swiper = new Swiper('.swiperCards', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    autoplay: {
        delay:2000,
    },
});
const cards = document.querySelectorAll(".swiper")
if(swiper.length >1) {
    for (let sw of swiper) {
        sw.autoplay.stop()
        sw.el.addEventListener("mouseenter", () => {
            sw.autoplay.start()
        })
        sw.el.addEventListener("mouseleave", () => {
            sw.autoplay.stop()
        })
    }
}
else{
    swiper.autoplay.stop()
    swiper.el.addEventListener("mouseenter", () => {
        swiper.autoplay.start()
    })
    swiper.el.addEventListener("mouseleave", () => {
        swiper.autoplay.stop()
    })
}