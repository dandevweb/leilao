$(document).ready(function () {

    const ajaxForm = $('.ajax-form')
    const ajaxAlert = $('.ajax-alert')
    $(ajaxForm).submit(function (e) {
        e.preventDefault();
        const url = $(this).attr('action')
        const formDataArray = $(this).serializeArray()
        let formDataObject = new Object()
        let isNotEmptyField = true

        $.each(formDataArray, function (i, valueOfElement) {
            formDataObject[valueOfElement.name] = valueOfElement.value
            if (valueOfElement.value === '') {
                isNotEmptyField = false
            }
        });

        const method = formDataObject.id ? 'PUT' : 'POST'

        if (isNotEmptyField) {
            $.ajax({
                url,
                method,
                "timeout": 0,
                "headers": {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                    "Authorization": formDataObject.token
                },
                data: JSON.stringify(formDataObject),
                success: function (response) {
                    if (response) {
                        $(ajaxAlert).text('Requisição efetuada com sucesso!')
                        $(ajaxAlert).css('display', 'flex');
                        $(ajaxAlert).addClass('show alert-success');
                        setInterval(() => {
                            $(ajaxAlert).css('display', 'none');
                            window.location.reload()
                        }, 4000);
                    }
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message
                    $(ajaxAlert).text(errorMessage)
                    $(ajaxAlert).css('display', 'flex');
                    $(ajaxAlert).addClass('show alert-danger');
                    setInterval(() => {
                        $(ajaxAlert).removeClass('show alert-danger');
                        $(ajaxAlert).css('display', 'none');
                    }, 5000);
                }
            })
        } else {
            return false
        }

    });


    $('#documentCompany').mask('00.000.000/0000-00')
});
