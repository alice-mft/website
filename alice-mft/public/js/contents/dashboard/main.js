SetLoadingAnimation({
    selector: "div#article",
    effect: "drop",
    duration: 200,
    options: {
        direction: "down"
    }
});

$('#waves').GenerateWaves({
    number: 1,
    smooth: 30,
    velocity: 1,
    height: 50,
    colors: ['#E74C3C'],
    border: {
        show: true,
        width: 3,
        color: ['#FFF']
    },
    opacity: 1,
    position: 'top'
});
