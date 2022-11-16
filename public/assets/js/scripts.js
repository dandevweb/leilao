$(document).ready(function () {
    const logged = sessionStorage.getItem('auction_client_id')
    const token = sessionStorage.getItem('auction_client_token')
    if (logged) {
        const clientName = sessionStorage.getItem('auction_client_name')
        $('#loggedUser').addClass('d-flex')
        $('#loginRoute').removeClass('d-flex')
        $('#loginRoute').addClass('d-none')
        $('#loggedUser strong').text(clientName)
        $('input[name=client_id]').val(logged)
        $('input[name=client_token]').val(token)
    }

    $('#myOffers').on('click', function (e) {
        e.preventDefault()
        $('#formOffers').submit();
    })

    $("#logout").on('click', function (e) {
        e.preventDefault()
        sessionStorage.clear()
        window.location.href = '/'
    });
});
