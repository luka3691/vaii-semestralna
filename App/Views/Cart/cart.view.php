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
                <h2 class="elegant-text">Ďakujeme za otázku ohľadom cenovej ponuky.</h2>
                <p class="lead">Budeme Vás kontaktovať na zadaný email.</p>
                <a class="w-100 btn btn-primary btn-lg my-2 elegant-button" href="?c=home" role="button">Späť na domovskú stránku</a>
            </div>

            <?php
        } else { ?>
            <div class="py-5 text-center">
                <!--<img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                -->
                <h2 class="elegant-text">Formulár na žiadosť o cenovú ponuku.</h2>
            </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary elegant-text">Produkty v košíku</span>
                </h4>
                <span class="elegant-text">Orientačná cena v eurách.</span>
                <ul class="list-group mb-3" id="listOfProducts">


                </ul>

            </div>
            <div class="col-md-6 col-lg-7">
                <h4 class="mb-3 elegant-text">Fakturačné údaje</h4>
                <form class="needs-validation" method="post" action="<?= "?c=cart&a=cart" ?>">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Meno*</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Priezvisko*</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="prosecco@prosimsi.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Adresa*</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Bernolákova 5" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Adresa 2 <span class="text-muted">(nepovinné)</span></label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Dodatočné údaje">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Krajina*</label>
                            <select class="form-select" id="country" name="country" disabled>
                                <option>Slovensko</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">PSČ*</label>
                            <input type="number" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <!-- sposob 1-->
                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                            <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>
                        <div class="form-check">
                            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <!-- sposob 2-->
                    <div class="list-group mx-0 w-auto">
                        <label class="list-group-item d-flex gap-2">
                            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="" checked="">
                            <span>
        First radio
        <small class="d-block text-muted">With support text underneath to add more detail</small>
      </span>
                        </label>
                        <label class="list-group-item d-flex gap-2">
                            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios2" value="">
                            <span>
        Second radio
        <small class="d-block text-muted">Some other text goes here</small>
      </span>
                        </label>
                        <label class="list-group-item d-flex gap-2">
                            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="">
                            <span>
        Third radio
        <small class="d-block text-muted">And we end with another snippet of text</small>
      </span>
                        </label>
                    </div>
                    <!-- sposob 3-->
                    <p>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Link with href
                        </a>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-bs-target
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                    </div>

                    <div class="col-md-6">

                        <span>Payment Method</span>
                        <div class="card">

                            <div class="accordion" id="accordionExample">

                                <div class="card">
                                    <div class="card-header p-0" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <div class="d-flex align-items-center justify-content-between">

                                                    <span>Paypal</span>
                                                    <img src="https://i.imgur.com/7kQEsHU.png" width="30">

                                                </div>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <input type="text" class="form-control" placeholder="Paypal email">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header p-0">
                                        <h2 class="mb-0">
                                            <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="d-flex align-items-center justify-content-between">

                                                    <span>Credit card</span>
                                                    <div class="icons">
                                                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                        <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                                        <img src="https://i.imgur.com/35tC99g.png" width="30">
                                                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                    </div>

                                                </div>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body payment-card-body">

                                            <span class="font-weight-normal card-text">Card Number</span>
                                            <div class="input">

                                                <i class="fa fa-credit-card"></i>
                                                <input type="text" class="form-control" placeholder="0000 0000 0000 0000">

                                            </div>

                                            <div class="row mt-3 mb-3">

                                                <div class="col-md-6">

                                                    <span class="font-weight-normal card-text">Expiry Date</span>
                                                    <div class="input">

                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" class="form-control" placeholder="MM/YY">

                                                    </div>

                                                </div>


                                                <div class="col-md-6">

                                                    <span class="font-weight-normal card-text">CVC/CVV</span>
                                                    <div class="input">

                                                        <i class="fa fa-lock"></i>
                                                        <input type="text" class="form-control" placeholder="000">

                                                    </div>

                                                </div>


                                            </div>

                                            <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3 elegant-text">Správa / Poznámka</h4>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <label for="cc-sprava" class="form-label">Bližšie informácie o vašej žiadosti o cenovú ponuku. <span class="text-muted">(nepovinné)</span></label>
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