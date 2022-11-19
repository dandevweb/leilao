$(document).ready(function () {

    const ajaxDelete = $('.ajax-delete')
    const ajaxAlert = $('.ajax-alert')
    $(ajaxDelete).submit(function (e) {
        e.preventDefault();
        const url = $(this).attr('action')
        const formDataArray = $(this).serializeArray()
        let formDataObject = new Object()

        $.each(formDataArray, function (i, valueOfElement) {
            formDataObject[valueOfElement.name] = valueOfElement.value
        });

        $.ajax({
            url,
            "method": "DELETE",
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": formDataObject.token
            },
            success: function () {
                $(ajaxAlert).text('Registro excluído com sucesso!')
                $(ajaxAlert).css('display', 'flex');
                $(ajaxAlert).addClass('show alert-success');
                setInterval(() => {
                    $(ajaxAlert).css('display', 'none');
                    window.location.reload()
                }, 3000);

            },
            error: function (error) {
                const errorMessage = error.responseJSON.message
                $(ajaxAlert).text(errorMessage)
                $(ajaxAlert).css('display', 'flex');
                $(ajaxAlert).addClass('show alert-danger');
                setInterval(() => {
                    $(ajaxAlert).removeClass('show alert-danger');
                    $(ajaxAlert).css('display', 'none');
                }, 3000);
            }
        })


    });


});
