var scroller = $("div#scroller");

$(window).on("scroll", () => {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - $("footer#footer").height()) {
        scroller.fadeOut(150);
    } else {
        scroller.fadeIn(150);
    }
});



scroller.on("click", () => {
    $('html, body').animate({ scrollTop: 0 }, 250);
});
