$(document).ready(function() {
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
});

function resizeEvent() {
    const scrolls = document.getElementsByClassName("scrollable-content");
    const footer = document.getElementsByTagName("footer")[0];
    for (let i = 0; i < scrolls.length; i++) {
        var h = footer.getBoundingClientRect().top - scrolls[i].getBoundingClientRect().top;
        scrolls[i].style.overflowY = "scroll";
        scrolls[i].style.overflowX = "hidden";
        scrolls[i].style.height = h + "px";
    }
}

setInterval(myTimer, 10);

function myTimer() {
    resizeEvent();
}