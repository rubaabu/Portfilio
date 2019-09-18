// Parses error string from php
// 1. Parameter error string
// "Output" modifies html tags
function displayErrorMsg(error_str) {

    let splitted_error_msg = error_str.split('/1s');

    for (let i = 0; i < splitted_error_msg.length; i++) {
        let errors_small = splitted_error_msg[i].split('/2s');
        
        if (errors_small[0] == 'gender') {
            document.querySelector('#genderM').className = 'custom-control-input is-invalid';
            document.querySelector('#genderF').className = 'custom-control-input is-invalid';
        } else if (errors_small[0] == 'datebirth') {
            document.querySelector('#' + errors_small[0]).className = 'form-control is-invalid';
        } else if (errors_small[0] == 'pic') {
            document.querySelector('#' + errors_small[0] + '_message').className = 'red';
        } else {
            document.querySelector('#' + errors_small[0]).className = 'form-control is-invalid';
            document.querySelector('#' + errors_small[0] + '_message').innerHTML = errors_small[1];
        }

    }

}

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}