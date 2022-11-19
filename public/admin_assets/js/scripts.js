
$(document).ready(function () {
    $("#logout").on('click', function (e) {
        e.preventDefault()
        clearCookie(defaultAdminCookieName)
        window.location.href = '/admin'
    });
});
