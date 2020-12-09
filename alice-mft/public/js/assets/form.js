function RegisterForm(parameters) {
    var form = $(parameters.form);
    var button = $(parameters.form + " button");
    var results = $(parameters.form + " div.results");

    form.on("submit", (event) => {
        event.preventDefault();
        button.prop("disabled", true);
        results.empty();
        results.append("<label class=\"status\">" + parameters.messages.loading + "</label>");

        AjaxRequest({
            type: "POST",
            form: form,
            url: parameters.url,
            onSuccess: (data, status, result) => {
                redirectTo(parameters.redirect);
            },
            onError: (result, status, error) => {
                button.prop("disabled", false);
                results.empty();
                results.append("<label class=\"status\">" + parameters.messages.error.replace("${error}", result.responseJSON.message) + "</label>");
            }
        });
    });
}

function CheckInputValidity(data) {
    var input = $(data.input);

    input.on("input", () => {
        var content = input.val();

        if (content.length > 0) {
            var pattern = new RegExp(input.attr("pattern"));

            if (pattern.test(content)) {
                if (input.hasClass("invalid")) input.removeClass("invalid");
                input.addClass("valid");
            } else {
                if (input.hasClass("valid")) input.removeClass("valid");
                input.addClass("invalid");
            }
        } else {
            input.removeClass("valid");
            input.removeClass("invalid");
        }
    });
}

function CheckFormValidity(data) {
    $(data.form + " input").each((i, element) => {
        CheckInputValidity({
            input: element
        });
    });
}
