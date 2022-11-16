$(document).ready(function () {
    const logged = sessionStorage.getItem('auction_client_id')
    if (logged) {
        const clientName = sessionStorage.getItem('auction_client_name')
        $('#loggedUser').addClass('d-flex')
        $('#loginRoute').removeClass('d-flex')
        $('#loginRoute').addClass('d-none')
        $('#loggedUser strong').text(clientName)
    }

    $("#logout").on('click', function (e) {
        e.preventDefault()
        sessionStorage.clear()
        window.location.href = '/'
    });
});
