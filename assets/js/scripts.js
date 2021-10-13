
$('#accept_rules').on('change', function() {
    $(this)
        .closest('#form_registration')
        .find('#submit_registration')
        .prop('disabled', !this.checked);
}).change();

let registration = {
    ajaxMethod: 'POST',

    validatePassword: function () {

        let password = $('#password').val()
        let confirmPassword = $('#confirm-password').val()

        if (password !== '') {
            if (password === confirmPassword) {

                return true

            } else {

                alert('Введенные пароли не совпадают')
                return false

            }

        } else {

            alert('пароль не может быть пустым')
            return false
        }
    },

    submit: function () {

        if (this.validatePassword()) {
            let formData = new FormData();

            formData.append('newUserName', $('#firstName').val())
            formData.append('newUserEmail', $('#email').val())
            formData.append('newUserPassword', $('#password').val())

            $.ajax({
                url: '/authorization/register',
                type: this.ajaxMethod,
                data: formData,
                dataType : 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    console.log(formData)
                },
                success: function (respond) {
                    if (typeof respond.error === 'undefined'){

                        console.log('пользователь зарегистрирован')
                        console.log(respond)

                    } else {

                        alert(respond.error)

                    }
                },
                error: function(jqXHR, status, errorThrown) {
                    console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
                }
            });
        }


    }

};

// console.log(registration)