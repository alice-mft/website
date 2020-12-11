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

function drawDisk(parameters) {
    var canvas = new CustomCanvas(parameters.canvas);

    // Disk presets
    var presets = [{
        count: 12,
        skip: 1,
        order: {
            top: [0, 0, 0, 0, 0, 0.25, 0, 0, 0, 0, 0, 0],
            bottom: [0, 1, 1, 1, 2, 2, 2, 1, 1, 1, 0, 0]
        }
    }, {
        count: 12,
        skip: 1,
        order: {
            top: [0, 0, 0, 0, 0, 0.25, 0, 0, 0, 0, 0, 0],
            bottom: [0, 1, 1, 1, 2, 2, 2, 1, 1, 1, 0, 0]
        }
    }, {
        count: 13,
        skip: 0,
        order: {
            top: [0, 0, 0, 0, 0, 0, 0.25, 0, 0, 0, 0, 0, 0],
            bottom: [0, 1, 1, 2, 2, 1.5, 1.5, 1.5, 2, 2, 1, 1, 0]
        }
    }, {
        count: 16,
        skip: 1,
        order: {
            top: [0, 0, 0, 0, 0, 0, 0, 0.25, 0, 0, 0, 0, 0, 0, 0, 0],
            bottom: [0, 0, 1, 1, 1, 1.5, 2, 2, 2, 1.25, 1, 1, 1, 0, 0, 0]
        }
    }, {
        count: 17,
        skip: 0,
        order: {
            top: [0, 0, 0, 0, 0, 0, 0, 0, 0.25, 0, 0, 0, 0, 0, 0, 0, 0],
            bottom: [0, 0, 1, 1, 2, 2, 1.75, 2.25, 2.25, 2.25, 1.75, 2, 2, 1, 1, 0, 0]
        }
    }];

    // The repartition order (height)
    var order = presets[parameters.preset].order;
    var ladders = presets[parameters.preset].count + presets[parameters.preset].skip;
    var skip = presets[parameters.preset].skip;

    var primary = 80/100*canvas.width; // the primary section (chips section)
    var padding = 10/100*canvas.width; // the space next to the section
    var margin = 1/100*canvas.width; // the space between each ladders
    var ladder = (primary/ladders) - ((ladders-1)*margin/ladders); // the chip width
    var height = 250; // the minimal height of each ladder

    var structure = {
        color: "#52BE80",
        components: [{
            type: "arc", // main arc
            center: {
                x: canvas.width/2,
                y: 0
            },
            radius: canvas.height,
            angle: {
                start: 0,
                end: Math.PI,
                anticlockwise: false
            }
        }, {
            type: "moveTo",
            x: canvas.width/2 + canvas.width/8/2,
            y: 0,
        }, {
            type: "arc", // little arc
            center: {
                x: canvas.width/2,
                y: 0
            },
            radius: canvas.height/8,
            angle: {
                start: 0,
                end: Math.PI,
                anticlockwise: false
            }
        }, {
            type: "moveTo",
            x: 0,
            y: 0,
        }, {
            type: "points", // left line
            points: [{
                x: 0,
                y: 0
            }, {
                x: canvas.width/2 - canvas.width/8/2,
                y: 0
            }]
        }, {
            type: "moveTo",
            x: canvas.width/2 + canvas.width/8/2,
            y: 0,
        }, {
            type: "points", // right line
            points: [{
                x: canvas.width/2 + canvas.width/8/2,
                y: 0
            }, {
                x: canvas.width,
                y: 0
            }]
        }]
    };

    var shapes = [];

    for (var i = skip; i < (ladders + skip); i++) {
        var y = isClosest(padding + i*ladder + i*margin, ladder, canvas.width/2 - canvas.width/8/2, canvas.width/2 + canvas.width/8/2) ? 90 : 40;

        shapes.push({
            type: "rectangle",
            color: (i - skip) === parameters.colored ? "#FFCD00" : "#222",
            origin: {
                x: padding + i*ladder + i*margin,
                y: y + order.top[i - skip]*90
            },
            width: ladder,
            height: height + order.bottom[i - skip]*90 - y,
            onClick: function() {
                alert("You clicked on a ladder !")
            }
        });
    }

    canvas.drawStructure(structure);
    canvas.drawMany(shapes);
}

function drawLadder(parameters) {
    var canvas = new CustomCanvas(parameters.canvas);

    var max = 5; // max chips
    var primary = 84/100*canvas.width; // the primary section (chips section)
    var secondary = 1/100*canvas.width; // the secondary section (connector section)
    var padding = 2.5/100*canvas.width; // the space between each section
    var margin = 2.5/100*canvas.width; // the space between each chip
    var chip = (primary/max) - ((max-1)*margin/max); // the chip width

    var height = 60/100*canvas.height;
    var verticalMargin = 20/100*canvas.height;

    var shapes = [{
        type: "rectangle", // container
        color: "#52BE80",
        origin: {
            x: 0,
            y: 0
        },
        width: canvas.width,
        height: canvas.height
    }, {
        type: "rectangle", // connector
        color: "#222",
        origin: {
            x: canvas.width - padding - secondary,
            y: verticalMargin
        },
        width: secondary,
        height: height
    }];

    for (var i = 0; i < parameters.chips; i++) {
        shapes.push({
            type: "rectangle", // each chip
            color: "#222",
            origin: {
                x: padding + i*chip + i*margin,
                y: verticalMargin
            },
            width: chip,
            height: height,
            onClick: function() {
                alert("You clicked on a chip !")
            }
        });
    }

    shapes.forEach(shape => {
        canvas.draw(shape);
    });
}

