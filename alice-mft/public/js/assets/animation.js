function SetLoadingAnimation(parameters, callback) {
    $(parameters.selector).hide();
    $(document).on("loaded", () => {
        $(parameters.selector).show(parameters.effect, parameters.options, parameters.duration, () => {
            callback();
        });
    });
}
