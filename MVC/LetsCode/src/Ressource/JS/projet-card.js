const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    autoplay: {
        delay:2000,
    },
});
const cards = document.querySelectorAll(".swiper")
for(let sw of swiper){
    sw.autoplay.stop()
    sw.el.addEventListener("mouseenter", ()=>{
        sw.autoplay.start()
    })
    sw.el.addEventListener("mouseleave", ()=>{
        sw.autoplay.stop()
    })
}