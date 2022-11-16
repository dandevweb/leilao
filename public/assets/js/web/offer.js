$(document).ready(function () {
    const form = $('#formMakeOffer')

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
                console.log(response);
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
        }).done(function (response) {
            if (response) {
                $('#alertOffer').removeClass('d-none')
                setInterval(() => {
                    $('#formOffers').submit();
                }, 4000);
            }
        });
    }


});
