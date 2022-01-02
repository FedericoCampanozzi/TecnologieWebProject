$(document).ready(function() {
    $("a").click(function() {
        resizeEvent();
    })
    resizeEvent();
});

function resizeEvent() {
    const fix = document.getElementById("fix-on-bot");
    const scrolls = document.getElementsByClassName("scrollable-content");
    const footer = document.getElementsByTagName("footer")[0];
    for (let i = 0; i < scrolls.length; i++) {
        var h = fix.getBoundingClientRect().top - scrolls[i].getBoundingClientRect().top - footer.getBoundingClientRect().height;
        scrolls[i].style.overflowY = "scroll";
        scrolls[i].style.height = h + "px";
    }
}