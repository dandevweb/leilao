$(document).ready(function () {
    const form = $('#formMakeOffer')
    const ajaxAlert = $('.ajax-alert')

    $(form).submit(function (e) {
        e.preventDefault();
        const url = $(this).attr('action')
        const formDataArray = $(this).serializeArray()
        let formDataObject = new Object()

        $.each(formDataArray, function (i, valueOfElement) {
            formDataObject[valueOfElement.name] = valueOfElement.value

        });

        $.ajax({
            url,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": `Bearer ${formDataObject.client_token}`
            },
            "data": JSON.stringify(formDataObject),
        }).done(function (response) {
            if (response.redirect) {
                window.location.href = response.redirect
            } else {
                makeOffer(response.data)
            }
        });

    });

    function makeOffer(offer) {
        const url = '/api/client/offer'
        $.ajax({
            url,
            data: JSON.stringify(offer),
            method: 'POST',
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": `Bearer ${offer.token}`
            },
            success: function (response) {
                $(ajaxAlert).text('Lance registrado com sucesso!')
                $(ajaxAlert).css('display', 'flex');
                $(ajaxAlert).addClass('show alert-success');
                window.scrollTo(0, 0);
                setInterval(() => {
                    $(ajaxAlert).css('display', 'none');
                    window.location.reload()
                }, 3000);
            },
            error: function (error) {
                let errorMessage = error.responseJSON.message
                if (error.responseJSON.error === "OfferInvalidException") {
                    errorMessage = 'O valor do seu lance é inválido.'
                }

                $(ajaxAlert).text(errorMessage)
                $(ajaxAlert).css('display', 'flex');
                $(ajaxAlert).addClass('show alert-danger');
                window.scrollTo(0, 0);
                setInterval(() => {
                    $(ajaxAlert).removeClass('show alert-danger');
                    $(ajaxAlert).css('display', 'none');
                }, 3000);
            }
        })
    }


});
