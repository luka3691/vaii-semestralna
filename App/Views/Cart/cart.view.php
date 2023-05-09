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
                <h2 class="elegant-text">Ďakujeme za vytvorenie objednávky.</h2>
                <p class="lead">Budeme Vás kontaktovať na zadaný email.</p>
                <a class="w-100 btn btn-primary btn-lg my-2 elegant-button" href="?c=home" role="button">Späť na domovskú stránku</a>
            </div>

            <?php
        } else { ?>
            <div class="py-5 text-center">
                <!--<img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                -->
                <h2 class="elegant-text">Formulár na vytvorenie objednávky.</h2>
            </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary elegant-text">Produkty v košíku</span>
                </h4>
                <ul class="list-group mb-3" id="listOfProducts">

                </ul>
            </div>
            <div class="col-md-6 col-lg-7">
                <form class="needs-validation" method="post" action="<?= "?c=cart&a=cart" ?>">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="mb-3 elegant-text">Fakturačné údaje</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">Meno*</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Je potrebne validné meno.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Priezvisko*</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Je potrebné validné priezvisko.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="prosecco@prosimsi.com" required>
                                        <div class="invalid-feedback">
                                            Prosím zadajte správnu mailovú adresu.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Adresa*</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Bernolákova 5" required>
                                        <div class="invalid-feedback">
                                            Prosím zadajte sprácnu faktturačnú adresu.
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
                                            PSČ je potrebné.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check pt-2">
                                    <input type="checkbox" class="form-check-input" id="same-address">
                                    <label class="form-check-label" for="same-address">Fakturačné a doručovacie údaje sú rozdielne.</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary btn-lg button-style mx-3 mb-3 align-self-center" style="width: 400px" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Pokračovať na výber spôsobu platby.</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="mb-3 elegant-text">Platba</h4>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group mx-0 w-auto">
                                    <label class="list-group-item d-flex gap-2">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="listGroupPlatba" id="listGroupPlatba1" value="1" checked="">
                                        <div class="row">
                                            <div class="icons">
                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                                <span>Kreditná karta</span>
                                            </div>
                                            <small class="text-muted">Po vytvorení objednávky budete presmerovaný na platobnú bránu.</small>
                                        </div>
                                        <span>+0.00€</span>
                                    </label>
                                    <label class="list-group-item d-flex gap-2">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="listGroupPlatba" id="listGroupPlatba2" value="2">
                                        <span>Dobierka<small class="d-block text-muted">Kuriér prijíma platby v hotovosti alebo platobnou kartou formou úhrady cez platobný terminál kuriéra.</small> </span>
                                        <span>+1.50€</span>
                                    </label>
                                </div>
                                <div class="row justify-content-center">
                                    <button class="btn btn-primary btn-lg button-style mx-3 mt-3 align-self-center" style="width: 400px" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">Pokračovať na výber spôsobu platby.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="mb-3 elegant-text">Doprava</h4>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group mx-0 w-auto">
                                    <label class="list-group-item d-flex gap-2">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="listGroupDoprava" id="listGroupDoprava1" value="1" checked="">
                                        <div class="row">
                                            <div class="icons">
                                                <span>Slovenská pošta na adresu.</span>
                                            </div>
                                            <small class="text-muted">Po vytvorení objednávky budete presmerovaný na platobnú bránu.</small>
                                        </div>
                                        <span>+3.90€</span>
                                    </label>
                                    <label class="list-group-item d-flex gap-2">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="listGroupDoprava" id="listGroupDoprava2" value="2">

                                        <div class="row">
                                            <div class="icons">
                                                <span>DPD kuriér.</span>
                                            </div>
                                            <small class="text-muted">Orientačný čas dodania kuriérom je štandardne 48 hodín počas pracovných dní.</small>
                                        </div>
                                        <span>+4.50€</span>
                                    </label>
                                    <label class="list-group-item d-flex gap-2">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="listGroupDoprava" id="listGroupDoprava3" value="3">

                                            <div class="row">
                                                <div class="icons">
                                                    <span>DHL kuriér.</span>
                                                </div>
                                                <small class="text-muted">Orientačný čas dodania kuriérom je štandardne 48 hodín počas pracovných dní.</small>
                                            </div>
                                            <span>+5.50€</span>


                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                    <hr class="my-4">

                    <h4 class="mb-3 elegant-text">Správa / Poznámka</h4>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <label for="cc-sprava" class="form-label">Odoslať objednávku. <span class="text-muted">(nepovinné)</span></label>
                            <textarea class="form-control" id="cc-sprava" name="cc-sprava" rows="3"></textarea>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg button-style" type="submit">Odoslať objednávku.</button>
                </form>
                <a class="w-100 btn btn-primary btn-lg my-2 elegant-button" href="?c=home" role="button">Späť na domovskú stránku</a>
            </div>
        </div>  <?php } ?>
    </main>


</div>