// Logout button
$("#logout").on("click", () => {
    AjaxRequest({
        type: "POST",
        form: "form",
        url: "account/logout",
        onSuccess: (data, status, result) => {
            redirectTo("/account/login");
        }
    });
});


// Topheader buttons
var container = $("div#container");

function adaptContainer() {
    var width = $( window ).width();
    if (width < 1000 && !container.hasClass("expanded")) {
        container.addClass("expanded");
    }

    if (width >= 1000 && container.hasClass("expanded")) {
        container.removeClass("expanded");
    }
}

$(document).ready(() => {
    adaptContainer();
});

$(window).resize(function() {
    adaptContainer();
});

$("a.menu").on("click", () => {
    container.hasClass("expanded") ? container.removeClass("expanded") : container.addClass("expanded");
});

$("a.options").on("click", () => {
    container.hasClass("options") ? container.removeClass("options") : container.addClass("options");
});

// Navmenu containers
$("p.reducable").on("click", (event) => {
    var element = $(event.target);
    element.next().toggle("blind", {}, element.next().children().length*75);
    element.hasClass("toggeled") ? element.removeClass("toggeled") : element.addClass("toggeled");
});

// Title section parameters
var options = $("div.options");
var chevron = $("i.button-icon");

$(document).ready(() => {
    options.hide();
    chevron.hasClass("reversed") ? chevron.removeClass("reversed") : chevron.addClass("reversed");
});

chevron.on("click", () => {
    options.toggle("blind", {}, 500);
    chevron.hasClass("reversed") ? chevron.removeClass("reversed") : chevron.addClass("reversed");
});

// Load datatables
$("table.datatable").each((i, element) => {
    $(element).dataTable();
});

// account dropdown
$("header div.account a").on("click", () => {
    var profile = $("header div.account");
    var dropdown = $("header div.account div.dropdown");

    if (profile.hasClass("developed")) {
        dropdown.hide("blind", {}, 250, () => {
            profile.removeClass("developed");
        });
    } else {
        profile.addClass("developed");
        dropdown.hide();
        dropdown.show("blind", {}, 250);
    }
});

// date
setInterval(() => {
    var now = new Date();
    $("header#top-header p.date").html(dig(now.getDate()) + "." + dig(now.getMonth() + 1) + "." + now.getFullYear() + " - " + dig(now.getHours()) + ":" + dig(now.getMinutes()) + ":" + dig(now.getSeconds()));
}, 1000);

function dig(nb) {
    var result = nb.toString();
    return result.length === 1 ? "0" + result : result;
}
