var html = $("html");
var loader = $("div#loader");
var loader_icon = $("div#loader span");

window.addEventListener("load", () => {
    loader_icon.hide(200, () => {
        loader.hide("fade", 600, () => {
            html.removeClass("loading");
            loader.css("display", "none");
            $(document).trigger("loaded");
        });
    })
});

$(document).ready(() => {
    $("body").css("display", "flex");

    $(window).ready(() => {
        window.scrollTo(0, 0);
    });
});


