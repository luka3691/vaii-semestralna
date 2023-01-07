<?php
$layout = 'auth';
/** @var Array $data */
/** @var \App\Core\IValidityChecker $validator */


?>
<div class="container">
    <?php
    $errors = [];
    if ($validator->newsletterEdit($errors)) {
        ?>
        <h5 class="card-title text-center">Zmeny boli vykonane.</h5>
        <?php
    }
    else { ?>

    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Zadajte email pre nastavenie preferencií.</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="POST" action="<?= "?c=auth&a=newsletter" ?>">
                        <div class="form-label-group mb-3" >
                            <label for="emailnewsletter2" class="visually-hidden">Emailová adresa</label>
                            <input id="emailnewsletter2" name="email2" type="email" class="form-control" placeholder="Emailová adresa" value="<?=$validator->getParam("email2")?>">
                        </div>
                        <?=$validator->printErrorMessage($errors, "email")?>
                        <h6>Vyberte si témy, ktoré vám budú chodiť na email.</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="gridCheck1" value="true" checked>
                            <label class="form-check-label" for="gridCheck1">
                                Informácie ohľadom objednávky
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck2" value="true" name="gridCheck2" checked>
                            <label class="form-check-label" for="gridCheck2">
                                Upozornenia na nové produkty
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck3" value="true" name="gridCheck3" checked>
                            <label class="form-check-label" for="gridCheck3">
                                Upozornenia na zľavy
                            </label>
                        </div>
                        <div class="text-center pt-2">
                            <button class="btn btn-primary button-style" type="submit" name="submit" >Upraviť preferncie</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-delete my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Zadajte email pre odhlásenie sa z newslettera.</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-delete" method="post" action="<?= "?c=auth&a=newsletter" ?>">
                        <div class="form-label-group mb-3" >
                            <label for="emailnewsletter3" class="visually-hidden">Emailová adresa</label>
                            <input id="emailnewsletter3" name="email3" type="email" class="form-control" placeholder="Emailová adresa" value="<?=$validator->getParam("email3")?>">
                        </div>
                        <?=$validator->printErrorMessage($errors, "email")?>

                        <div class="text-center">
                            <button class="btn btn-primary button-style" type="submit" name="delete" >Odhlásiť</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="text-center"><button class="btn btn-primary button-style text-center pt-2 pb-2" onclick="window.location.href='?c=home';">
            Vrátiť sa späť
        </button>
    </div>


</div>