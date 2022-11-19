$(document).ready(function () {
    const formLogin = $('#login')
    const alertLogin = $('#alertLogin')
    $(formLogin).submit(function (e) {
        e.preventDefault();
        const email = $('#email').val()
        const password = $('#password').val()
        const url = $(formLogin).attr('action')

        function isNotEmptyField() {
            return !(email === '' || password === '')
        }

        if (isNotEmptyField()) {
            $.ajax({
                url,
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                data: JSON.stringify({
                    email,
                    password
                }),
                success: function (response) {
                    console.log(response)
                    createCookie(defaultAdminCookieName, JSON.stringify(response), 1)
                    window.location.href = '/admin'
                },
                error: function (error) {
                    $(alertLogin).addClass('show');
                    setInterval(() => {
                        $(alertLogin).removeClass('show');
                    }, 4000);
                }
            })
        } else {
            alert('Preencha todos os campos')
        }

    });
});
