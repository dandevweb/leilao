$(document).ready(function () {

    const formRegister = $('#register')
    const alertRegister = $('#alertRegister')
    $(formRegister).submit(function (e) {
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

        if (isNotEmptyField) {
            $.ajax({
                url,
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                data: JSON.stringify(formDataObject),
                success: function (response) {
                    if (response) {
                        $(alertRegister).text('Cadastro efetuado com sucesso!')
                        $(alertRegister).css('display', 'flex');
                        $(alertRegister).addClass('show alert-success');
                        setInterval(() => {
                            $(alertRegister).css('display', 'none');
                            window.location.href = '/login'
                        }, 5000);
                    }
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message
                    $(alertRegister).text(errorMessage)
                    $(alertRegister).css('display', 'flex');
                    $(alertRegister).addClass('show alert-danger');
                    setInterval(() => {
                        $(alertRegister).removeClass('show alert-danger');
                        $(alertRegister).css('display', 'none');
                    }, 5000);
                }
            })
        } else {
            alert('Preencha todos os campos')
        }

    });


    $('input[name=document').mask('000.000.000-00')
});
