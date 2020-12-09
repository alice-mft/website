function SetLoadingAnimation(parameters) {
    $(parameters.selector).hide();
    $(document).on("loaded", () => {
        $(parameters.selector).show(parameters.effect, parameters.options, parameters.duration);
    });
}
