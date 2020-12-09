class WebSocket {

    constructor(host, port, endpoint) {
        this.host = host;
        this.port = port;
        this.endpoint = endpoint;
        this.client = null;
    }

    connect(callback, openCallback, closeCallback) {
        if (this.client != null)
            return;

        var socket = new SockJS("http://" + this.host + ":" + this.port + this.endpoint);

        socket.onopen = () => {
            alert("onopen")
            openCallback();
        };
        socket.onclose = () => {
            alert("onclose")
            closeCallback();
        };

        this.client = Stomp.over(socket);
        this.client.connect({}, () => {
            callback();
        });
    }

    disconnect() {
        if (this.client == null)
            return;

        this.client.disconnect();
        this.client = null;
    }

    subscribe(path, callback) {
        if (this.client == null)
            return;

        this.client.subscribe(path, (message) => {
            callback(message);
        });
    }

    unsubscribe(path) {
        if (this.client == null)
            return;

        this.client.unsubscribe(path);
    }

    send(path, object) {
        this.client.send(path, {}, object);
    }

}
