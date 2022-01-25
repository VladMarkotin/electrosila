/**
 * Created by Vlad on 24.06.2018.
 */
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function checkPass(pass, repass){
    if(pass === repass){
        return true;
    }

    return false;
}

function validatePhoneNumber(phone){
    let codes = ['(25)', '(29)', '(33)', '(44)']
    let check;
    check = codes.find(function (el) {
        return phone.indexOf(el) !== -1;
    })

    return !!(check);
}


$('#final_add_emp').click(function (event) {
    event.preventDefault();
    let email = $('#email').val();
    let pass = $('#pass').val();
    let repass = $('#repass').val();
    let phone = $('#phone').val();

    var form = $('#add-form').serialize();
    var url = "/";
    if (validateEmail(email) && (checkPass(pass, repass)) && (validatePhoneNumber(phone) !== false)) {
        $("#status").hide();
        $.post("add", form).done(function (response) {
            console.log(response);
            $('#closeModal').click();
            let el = $('#success_status');
            el.show();
            setTimeout(() => el.hide(), 3000);
        });
    }else{
        $("#status").show();
        $('#err-message').click(function(){
            $("#status").hide();
        });
    }
});