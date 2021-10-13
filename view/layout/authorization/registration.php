<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/header.php';
/*
 * Отображается форма регистрации с полями имя, email, пароль и подтверждение пароля
 *, а также с галочкой “согласен с правилами сайта” и ссылкой на эти правила.
 * Все поля обязательны к заполнению. Под формой отображается ссылка на авторизацию.
 * При ошибке регистрации эта ошибка должна быть отображена рядом с полем, к которому ошибка относится.
 * После регистрации пользователь автоматически авторизуется.onsubmit="return false"
 */
?>
<div class="container">
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Регистрация</h4>
        <form class="needs-validation" id="form_registration" onsubmit="return false">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback" wfd-invisible="true">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback" wfd-invisible="true">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" required>
                    <div class="invalid-feedback" wfd-invisible="true">
                        Please enter your shipping address.
                    </div>
                </div>
                <div class="col-12">
                    <label for="confirm-password" class="form-label">Повторите пароль</label>
                    <input type="password" class="form-control" id="confirm-password" required>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="accept_rules">
                <label class="form-check-label" for="same-address">Согласен с <a href="/rules" target="_blank">правилами</a> сайта</label>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit" id="submit_registration" onclick="registration.submit()" disabled>Зарегистрироваться</button>
        </form>
    </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';
