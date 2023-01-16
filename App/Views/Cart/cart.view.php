<?php
$layout = 'cart';
/** @var Array $data */
/** @var \App\Models\Cart_item $product */
/** @var \App\Core\IValidityChecker $validator */
?>
<div class="container">
    <main>
        <?php
        $errors = [];
        if ($validator->ordering($errors)) {
            ?>
            <div class="py-5 text-center">
                <!--<img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                -->
                <h2>Ďakujeme za otázku ohľadom cenovej ponuky.</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>
            <?php
        } else { ?>
            <div class="py-5 text-center">
                <!--<img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                -->
                <h2>Formulár na žiadosť o cenovú ponuku.</h2>
            </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Produkty v košíku</span>
                </h4>
                <span>Orientačná cena</span>
                <ul class="list-group mb-3" id="listOfProducts">


                </ul>

            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Fakturačné údaje</h4>
                <form class="needs-validation" method="post" action="<?= "?c=cart&a=cart" ?>">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Meno</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Priezvisko</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Adresa</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Adresa 2 <span class="text-muted">(nepovinné)</span></label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Krajina</label>
                            <select class="form-select" id="country" name="country" disabled>
                                <option>Slovensko</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">PSČ</label>
                            <input type="number" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Správa / Poznámka</h4>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <label for="cc-name" class="form-label">Bližšie informácie o vašej žiadosti o cenovú ponuku.</label>
                            <textarea class="form-control" id="cc-sprava" name="cc-sprava" rows="3"></textarea>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg button-style" type="submit">Získať cenovú ponuku</button>
                </form>
                <a class="w-100 btn btn-primary btn-lg my-2 elegant-button" href="?c=home" role="button">Späť na domovskú stránku</a>
            </div>
        </div>  <?php } ?>
    </main>


</div>