let lastTab = null;
let curTab = null;
/*
window.addEventListener("load", loadEvent);

function loadEvent() {
    //adjustFooterCssTopToSticky();
} */
$(document).ready(function() {
    $("a").click(function() {
        lastTab = curTab;
        console.log($(this).attr('href'));
        curTab = $(this).attr('href');
        curTab = curTab.substring(1, curTab.length);
        console.log(curTab);
        resizeEvent();
    });
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
});

function resizeEvent() {
    const fix = document.getElementById("fix-on-bot");
    const scrolls = document.getElementsByClassName("scrollable-content");
    const footer = document.getElementsByTagName("footer")[0];
    let ctab_h = -1;
    if (lastTab != null) {
        ctab_h = document.getElementById(curTab).getBoundingClientRect().top;
        let ziocane = document.getElementById(lastTab).getBoundingClientRect();
        console.log(ziocane.x);
        console.log(ziocane.y);
        console.log(ziocane.left);
        console.log(ziocane.right);
        console.log(ziocane.bottom);
        console.log(ziocane.top);
        console.log(ziocane.width);
        console.log(ziocane.height);
    }
    for (let i = 0; i < scrolls.length; i++) {
        var h = fix.getBoundingClientRect().top - scrolls[i].getBoundingClientRect().top - footer.getBoundingClientRect().height;
        console.log("TAB HEIGHT : " + ctab_h + " CALCOLATA : " + h);
        //if (ctab_h > h) {
        scrolls[i].style.overflowY = "scroll";
        scrolls[i].style.height = h + "px";
        //}
    }
}