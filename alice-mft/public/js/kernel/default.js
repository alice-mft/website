function retrieveUrl(pathTo) {
    var base = window.location.protocol + "//" + window.location.host;
    var path = "/" + pathTo;

    return base + path.replace("//", "/");
}

function redirectTo(path) {
    window.location.replace(getURL(path));
}

function isClosest(x, width, min, max) {
    return (min <= x  && x <= max) || (min <= x + width  && x + width <= max);
}

function random(min, max){
    return min+Math.floor(Math.random() * (max - min + 1));
}
