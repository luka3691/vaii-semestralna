<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto ">
            <div class="card card-signin my-5 ">
                <div class="card-body" style=" outline-color: cadetblue; box-shadow: dimgray;" >
                    <h5 class="card-title text-center">Registrácia</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-register" method="post" action="<?= \App\Config\Configuration::REGISTER_URL ?>">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                   required autofocus>
                            <label class="form-check-label" for="login" hidden>
                                Prihlasovacie meno
                            </label>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Heslo v rozmedzí 6 až 20 znakov." required>
                            <label class="form-check-label" for="password" hidden>
                                Heslo
                            </label>
                        </div>
                        <div class="text-center">
                            <button class="w-100 elegant-button" type="submit" name="submit">Zaregistrovať sa
                            </button>
                            <a class=" elegant-button w-100 btn  my-2" href="?c=home" role="button">Späť na domovskú stránku</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>