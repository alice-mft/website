function triggerAlert(content) {
    $("div#container").prepend('<div id="alert"><div class="popup"><span class="close"></span><div class="header"><img src="../../../img/mft/banner-dark.png""></div><div class="body"><h3>' + content.title + '</h3><p>' + content.description + '</p><button class="dark">Refresh</button></div></div></div>');

    $("div#alert").hide();
    $("div#alert").fadeIn(200, () => {
        $("div#alert > div.popup").show("bounce", {direction: "up", times: 1}, 200);
    });
    $("div#alert > div.popup").hide();


    $("div#alert button").on("click", () => {
        document.location.reload(true);
    });

    $("div#alert span").on("click", () => {
        $("div#alert > div.popup").hide("drop", {direction: "up"}, 200);
        $("div#alert").fadeOut(200);
    });

    $(document).on('keydown', function(event) {
        if (event.key === "Escape") {
            $("div#alert > div.popup").hide("drop", {direction: "up"}, 200);
            $("div#alert").fadeOut(200);
        }
    });

    var a = $("div#alert").offsetTop;
    $(window).on("scroll", () => {
        if ($(window).scrollTop() + $("header#top-header").height() >= a) {
            if (!$("div#alert").hasClass("sticky-header"))
                $("div#alert").addClass("sticky-header");
        } else {
            if ($("div#alert").hasClass("sticky-header"))
                $("div#alert").removeClass("sticky-header");
        }
    });
}
