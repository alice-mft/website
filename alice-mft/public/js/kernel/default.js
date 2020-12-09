function retrieveUrl(pathTo) {
    var base = window.location.protocol + "//" + window.location.host;
    var path = "/" + pathTo;

    return base + path.replace("//", "/");
}

function redirectTo(path) {
    window.location.replace(getURL(path));
}
