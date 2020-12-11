SetLoadingAnimation({
    selector: "div#form",
    effect: "drop",
    duration: 200,
    options: {
        direction: "left"
    }
});

CheckFormValidity({
    form: "form"
});

RegisterForm({
    form: "form",
    url: "account/login",
    redirect: "dashboard/",
    messages: {
        loading: "Loading the session ...",
        error: "An error occurred while loading the session: ${error}"
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
