$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: { email: email, password: password },
            success: function(response) {
                if(response == 'success') {
                    window.location.href = 'profile.html';
                } else {
                    alert('Invalid login credentials!');
                }
            }
        });
    });
});