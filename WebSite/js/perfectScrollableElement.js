$(document).ready(function() {
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
});

function resizeEvent() {
    if ($(window).width() >= 500) {
        const fix = document.getElementById("fix-on-bot");
        const scrolls = document.getElementsByClassName("scrollable-content");
        const footer = document.getElementsByTagName("footer")[0];
        let ctab_h = -1;
        for (let i = 0; i < scrolls.length; i++) {
            var h = fix.getBoundingClientRect().top - scrolls[i].getBoundingClientRect().top - footer.getBoundingClientRect().height;
            scrolls[i].style.overflowY = "scroll";
            scrolls[i].style.overflowX = "hidden";
            scrolls[i].style.height = h + "px";
        }
    }
}

setInterval(myTimer, 10);

function myTimer() {
    resizeEvent();
}