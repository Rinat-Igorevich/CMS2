
$('#accept_rules').on('change', function() {
    $(this)
        .closest('#form_registration')
        .find('#submit_registration')
        .prop('disabled', !this.checked);
}).change();

let registration = {
    ajaxMethod: 'POST',

    submit: function () {

        let formData = new FormData();
        console.log($('#firstName').val())
        console.log($('#email').val())
        console.log($('#password').val())
        console.log($('#password').val())
        // this.event.stopPropagation()
        formData.append('newUserName', $('#firstName').val())
        formData.append('newUserEmail', $('#email').val())
        formData.append('newUserPassword', $('#password').val())

        $.ajax({
            url: '/authorization/register',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                console.log(formData)
            },
            success: function (result) {
                console.log(result);
            },
            error: function(jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }
        });
    }

};

console.log(registration)