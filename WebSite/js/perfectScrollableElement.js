$(document).ready(function() {
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
    setInterval(autoResize, 5);
});

function autoResize() {
    resizeEvent();
}

function resizeEvent() {
    const body = document.getElementsByTagName("body")[0].getBoundingClientRect().height;
    const footer = document.getElementsByTagName("footer")[0];
    const header = document.getElementsByTagName("header")[0].getBoundingClientRect().height;
    const scrolls = document.getElementsByClassName("scrollable-content");
    const nav = $("ul.nav")[0];
    footer.classList.remove("permanent-fix-on-bot");
    if (typeof nav == 'undefined') {
        if (body < (screen.height - footer.getBoundingClientRect().height - header)) {
            footer.classList.add("permanent-fix-on-bot");
        }
    }
    if (screen.width > 400) {
        for (let i = 0; i < scrolls.length; i++) {
            var h = footer.getBoundingClientRect().top - scrolls[i].getBoundingClientRect().top;
            scrolls[i].style.overflowY = "scroll";
            scrolls[i].style.overflowX = "hidden";
            scrolls[i].style.height = h + "px";
        }
    }
}