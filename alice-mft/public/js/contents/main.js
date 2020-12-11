SetLoadingAnimation({
    selector: "div#title",
    effect: "drop",
    duration: 200,
    options: {
        direction: "down"
    }
});

$('#topWave').GenerateWaves({
    number: 1,
    smooth: 30,
    velocity: 1,
    height: 30,
    colors: ['#E74C3C'],
    border: {
        show: true,
        width: 3,
        color: ['#FFF']
    },
    opacity: 1,
    position: 'bottom'
});

$('#bottomWave').GenerateWaves({
    number: 1,
    smooth: 30,
    velocity: 1,
    height: 80,
    colors: ['#E74C3C'],
    border: {
        show: true,
        width: 3,
        color: ['#FFF']
    },
    opacity: 1,
    position: 'top'
});
