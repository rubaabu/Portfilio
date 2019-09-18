function clear() {
    document.querySelector('#firstname').className = 'form-control';
    document.querySelector('#lastname').className = 'form-control';
    document.querySelector('#nickname').className = 'form-control';
    document.querySelector('#email').className = 'form-control';
    document.querySelector('#genderM').className = 'custom-control-input';
    document.querySelector('#genderF').className = 'custom-control-input';
    document.querySelector('#datebirth').className = 'form-control';
    document.querySelector('#password').className = 'form-control';
    document.querySelector('#password_re').className = 'form-control';
    document.querySelector('#pic_message').className = '';
}

$('#submit').click(function() {

    let form = document.getElementsByTagName('form')[0];

    let formData = new FormData(form);

    $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/registerAction.php',
        data: formData,
        contentType: false,
        processData: false
    }).done(function(res) {

        clear();

        if (res != '') {
            displayErrorMsg(res);
        } else {
            window.location.href = 'login.php';
        }
        
    });

});