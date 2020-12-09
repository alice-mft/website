var footer = $("nav#navigation div.footer");
var p = $("nav#navigation div.footer p");

const webSocket = new WebSocket("localhost", 8080, "/websocket");

webSocket.connect(() => {
    webSocket.subscribe('/response/alert', (alert) => {
        showAlert("Database fields have been updated. As a result, the data contained on this page are no longer up to date. You should refresh the page.");
    });
}, () => {
    footer.addClass("connected");
    p.html("Connected !");
}, () => {
    footer.removeClass("connected");
    p.html("Disconnected !");
    showAlert("You have been disconnected from the server. We are trying to reconnect ... As long as the connection is closed, you will not be notified of any changes to the database.")
});

$('.send').click(function() {
    webSocket.send("/request/alert", JSON.stringify({
        title: "packetName",
        description: "{}"
    }));
});

$("p.show-alert").on("click", () => {
    webSocket.send("/request/alert", JSON.stringify({
        title: "packetName",
        description: "{}"
    }));
});

