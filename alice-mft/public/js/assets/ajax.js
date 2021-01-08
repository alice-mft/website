function AjaxRequest(parameters) {
    $.ajax({
        type: parameters.type,
        url: parameters.url, //retrieveUrl(parameters.url),
        //data: $(parameters.form).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data, status, result) => {
            if (parameters.onSuccess)
                parameters.onSuccess(data, status, result)
        },
        error: (result, status, error) => {
            if (parameters.onError)
                parameters.onError(result, status, error);
        },
        complete: (result, status) => {
            if (parameters.onComplete)
                parameters.onComplete(result, status);
        }
    });
}
