function clear() {
    document.querySelector('#email').className = 'form-control';
    document.querySelector('#password').className = 'form-control';
}

$('#submit').click(function() {

    let email = document.querySelector('#email').value;
    let password = document.querySelector('#password').value;

    $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/loginAction.php',
        data: { email: email, password: password }
    }).done(function(res) {

        clear();

        if (res != 'success') {
            displayErrorMsg(res);
        } else {
            window.location.href = 'userlanding.php';
        }
    });

})