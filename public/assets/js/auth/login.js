$(document).ready(function () {
    const formLogin = $('#login')
    const alertLogin = $('#alertLogin')
    $(formLogin).submit(function (e) {
        e.preventDefault();
        const email = $('#name').val()
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
                    const token = `${response.token_type} ${response.access_token}`
                    sessionStorage.setItem('auction_client_token', token)
                    sessionStorage.setItem('auction_client_id', response.data.id)
                    sessionStorage.setItem('auction_client_name', response.data.name)
                    window.location.href = '/'
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
