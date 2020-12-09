class CustomCanvas {

    constructor(canvas) {
        this.canvas = $(canvas);
        this.context = this.canvas[0].getContext("2d");
        this.height = this.canvas[0].height;
        this.width = this.canvas[0].width;

        this.shapes = [];

        this.canvas.mousedown((event) => {
            var offset = this.canvas.offset();
            var mouseX = parseInt(event.clientX - offset.left);
            var mouseY = parseInt(event.clientY - offset.top);

            this.shapes.forEach(shape => {
                this.define(shape);

                if (this.context.isPointInPath(mouseX, mouseY)) {
                    shape.onClick();
                }
            });
        });
    }

    draw(shape) {
        this.define(shape, shape.onClick);
        this.fill(shape.color);
    }

    drawMany(shapes) {
        shapes.forEach(shape => {
            this.draw(shape);
        });
    }

    drawStructure(structure) {
        this.defineStructure(structure.components);
        this.fill(structure.color, true);
    }

    define(shape, clickable = false) {
        if (clickable)
            this.shapes.push(shape);

        this.context.beginPath();

        switch (shape.type) {
            case "points":
                this.points(shape);
                break;

            case "rectangle":
                this.rectangle(shape);
                break;

            case "arc":
                this.arc(shape);
                break;
        }
    }

    defineStructure(components) {
        this.context.beginPath();

        components.forEach(shape => {
            switch (shape.type) {
                case "points":
                    this.points(shape);
                    break;

                case "rectangle":
                    this.rectangle(shape);
                    break;

                case "arc":
                    this.arc(shape);
                    break;

                case "moveTo":
                    this.moveTo(shape);
                    break;
            }
        });
    }

    fill(color, evenodd = false) {
        if (color) {
            this.context.fillStyle = color;
            this.context.fill(evenodd ? "evenodd" : "nonzero");
        }

        this.context.stroke();
    }

    points(shape) {
        this.context.moveTo(shape.points[0].x, shape.points[0].y);

        for (var i = 1; i < shape.points.length; i++) {
            this.context.lineTo(shape.points[i].x, shape.points[i].y);
        }
    }

    rectangle(shape) {
        this.context.rect(shape.origin.x, shape.origin.y, shape.width, shape.height);
    }

    arc(shape) {
        this.context.arc(shape.center.x, shape.center.y, shape.radius, shape.angle.start, shape.angle.end, shape.angle.anticlockwise);
    }

    moveTo(shape) {
        this.context.moveTo(shape.x, shape.y);
    }
}
