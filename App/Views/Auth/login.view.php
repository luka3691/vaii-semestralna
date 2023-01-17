<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body" style=" outline-color: cadetblue; box-shadow: dimgray;">
                    <h5 class="card-title text-center">Prihlásenie</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                   required autofocus>
                            <label class="form-check-label" for="login">
                                Prihlasovacie meno
                            </label>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Heslo" required>
                            <label class="form-check-label" for="password">
                                Heslo
                            </label>
                        </div>
                        <div class="text-center">
                            <button class="w-100 elegant-button" type="submit" name="submit">Prihlásiť sa
                            </button>
                            <a class="w-100 btn btn-lg my-2" href="?c=home" role="button">Späť na domovskú stránku</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                 -- <h1 class="modal-title fs-5" >Modal title</h1>
                <h1 class="fw-bold mb-0 fs-2">Prihláste sa do svojho zákazníckeho účtu.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3 text-bg-light " id="floatingInputLogin" placeholder="name@example.com">
                        <label class="text-black" for="floatingInputLogin">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3 text-bg-light" id="floatingPasswordLogin" placeholder="Password">
                        <label class="text-black" for="floatingPasswordLogin">Heslo</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg elegant-button disabled" name="login" type="submit">Prihlásiť sa</button>

                </form>
            </div>
        </div>
    </div>
</div> -->