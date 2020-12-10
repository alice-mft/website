class WebSocket2 {

    constructor(host, port, endpoint) {
        this.host = host;
        this.port = port;
        this.endpoint = endpoint;
        this.url = "http://" + this.host + ":" + this.port + this.endpoint;
        this.client = null;
    }

    connect(openCallback, closeCallback) {
        if (this.client != null)
            return;

        this.client = Stomp.over(new SockJS(this.url));
        this.client.connect({}, () => {
            if (openCallback != null) {
                openCallback();
            }
        }, () => {
            if (closeCallback != null) {
                closeCallback();
            }
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
            if (callback != null) {
                callback(message);
            }
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
