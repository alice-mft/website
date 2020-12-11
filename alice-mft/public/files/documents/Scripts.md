# Scripts

## Ajax.js
- Emplacement: `public/scripts/ajax.js`
- Ce script est automatiquement ajouté à **toutes les pages**.

Permet de formuler de manière très simple des requêtes ajax comme cela:
```javascript
AjaxRequest({
    type: "POST", // the request type
    form: "form", // the form selector
    url: profile, // the controller path (from root)
    onSuccess: (data, status, result) => {
        ...
    },
    onError: (result, status, error) => {
        ...
    },
    onComplete: (result, status) => {
        ...
    }
});
```

## Animation.js
- Emplacement: `public/scripts/animation.js`
- Ce script est automatiquement ajouté à **toutes les pages**.

Permet de faire apparaitre des éléments sur la page avec des effets juste après la fin du chargement.
```javascript
SetLoadingAnimation({
    selector: "section#main > div",
    effect: "drop",
    duration: 200, // in milliseconds
    options: {
        direction: "down" // the effect direction
    }
});
```
Les effets disponibles sont les suivants:
- Blind
- Bounce
- Clip
- Drop
- Explode
- Fade
- Fold
- Highlight
- Puff
- Pulsate
- Scale
- Shake
- Size
- Slide

Pour visualiser tous les effets ci-dessus, [cliquez-ici](https://jqueryui.com/show/).

## Canvas.js
- Emplacement: `public/scripts/canvas.js`
- Ce script n'est ajouté à **aucune page**.

Pour ajouter le script à la page:
```html
@section("scripts")
    @parent
    <script src="{{ url("scripts/canvas.js") }}"></script>
@endsection
```

Ce script permet de dessiner des objets de manière simple sur un canvas. Il permet également d'ajouter des actions lors du clic.
```javascript
// on instancie notre classe
var canvas = new CustomCanvas(id);

// définir une figure à partir de points
var points = {
    type: "points",
    color: "#222",
    points: [{
        x: 150,
        y: 50
    }, {
        x: 250,
        y: 50
    }, {
        x: 200,
        y: 100
    }, {
        x: 100,
        y: 100
    }],
    onClick: function() {
        ...
    }
};

// définir un rectangle
var rectangle = {
    type: "rectangle",
    color: "#222",
    origin: {
        x: 200,
        y: 0
    },
    width: 50,
    height: 50,
    onClick: function() {
        ...
    }
};

// définir un arc de cercle
var arc = {
    type: "arc",
    color: "#222",
    center: {
        x: 200,
        y: 0
    },
    radius: 100,
    angle: {
        start: 0,
        end: Math.PI,
        anticlockwise: false
    },
    onClick: function() {
        ...
    }
};

// on dessine nos trois formes
canvas.draw(points);
canvas.draw(rectangle);
canvas.draw(arc);
```

## Figures.js
- Emplacement: `public/scripts/figures.js`
- Ce script n'est ajouté à **aucune page**.

Pour ajouter le script à la page:
```html
@section("scripts")
    @parent
    <script src="{{ url("scripts/figures.js") }}"></script>
@endsection
```

Ce script permet de dessiner automatiquement un objet prédéfini sur un canvas de manière simple.

```javascript
// pour dessiner un disk
drawDisk({
    canvas: "canvas", // the selector
    preset: 1, // the preset (disk id)
    colored: 6 // the ladder to color (-1 for no coloration)
});

// pour dessiner un ladder
drawLadder({
    canvas: "canvas", // the selector
    chips: 4 // the chips to draw
});
```

## Form.js
- Emplacement: `public/scripts/form.js`
- Ce script n'est ajouté à **aucune page**.

Pour ajouter le script à la page:
```html
@section("scripts")
    @parent
    <script src="{{ url("scripts/form.js") }}"></script>
@endsection
```

Ce script permet de gérer les formulaires de manière très simple.

```javascript
// Permet d'enregistrer un formulaire automatiquement
RegisterForm({
    form: "form",
    url: profile,
    redirect: "dashboard/",
    messages: {
        loading: "Creating the new profile ...",
        error: "An error occurred while creating the new profile: ${error}"
    }
});

// Ajoute un check de validité sur l'input
CheckInputValidity({
    input: "input"
});

// Ajoute un check de validité sur tous les inputs du formulaire (
CheckFormValidity({
    form: "form"
});
```


## Index

## Datatables
//$("table#datatable").dataTable();
