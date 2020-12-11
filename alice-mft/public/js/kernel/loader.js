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

    // Dynamic height
    $("*[data-height]").each((i, element) => {
        var attribute = $(element).attr("data-height");
        $(element).css("height", attribute);
    });

    // Load images
    $("*[data-image]").each((i, element) => {
        var attribute = $(element).data("image");
        $(element).css("background-image", "url('" + attribute + "')");
    });

    $(window).ready(() => {
        window.scrollTo(0, 0);
    });
});


