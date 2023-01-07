<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\IValidityChecker $validator */

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link href="/public/css/hlavna_styl.css" rel="stylesheet">
    <script src="/public/js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="?c=products&a=prosecco">Prosecco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=products&a=wine">Víno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=products&a=spritz">Spritz Aperitív</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=products&a=oliveoil">Olivový olej</a>
                </li>
            </ul>
            <div class="d-flex justify-content-center">
                <form method="POST" class="d-flex" role="search">
                    <input class="form-control me-2 flex" name="search" type="search" placeholder="Hľadanie v obchode..." aria-label="Search" value="<?=$validator->getParam("search")?>">
                    <button class="btn button-style disabled" type="submit">Hľadať</button>

                </form>
                <div class="text-end ps-2">
                    <?php if ($auth->isLogged()) { ?>

                        <button class="btn btn-outline-primary me-2 login-button" onclick="window.location.href='?c=auth&a=logout';">
                            Odhlásiť sa
                        </button>



                    <?php } else { ?>
                        <form>
                            <input id="loginModalTrigger" type="button" class="btn btn-outline-primary me-2 login-button" data-bs-target="#loginModal" data-bs-toggle="modal" value="Prihlásiť sa" />
                            <input id="registerModalTrigger" type="button" class="btn btn-outline-primary me-2 login-button" data-bs-target="#registerModal" data-bs-toggle="modal" value="Zaregistrovať sa" />
                        </form>
                        <!-- <button id="loginModalTrigger" type="button" class="btn btn-outline-primary me-2 login-button" data-bs-target="#loginModal" data-bs-toggle="modal" >Prihlásiť sa</button> -->

                    <?php } ?>

                </div>
                <button type="button" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" id="cart-no-plus" >
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                    </svg>
                    <?php if ($auth->isLogged()) { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16" id="cart-check" color="yellow">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                        </svg>
                    <?php } ?>

                </button>
            </div>

        </div>

        <div class="logo-header-wrapper">
            <div class="logo logo-header">
                <a style="text-decoration: none" class="logo" href="?c=home" target="_self">ProseccoStore</a>
            </div>
        </div>


    </div>
</nav>

<div>
    <?php if ($auth->isLogged()) { ?>
<!--
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">
                        <button type="button" class="btn btn-outline-primary me-2 login-button" data-bs-target="#logoutModal" data-bs-toggle="modal" href="?c=auth&a=logout">Odhlasit sa</button>
                    </div>
                </div>
            </div>
        </div> -->
    <?php } else { ?>
        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2">Prihláste sa do svojho zákazníckeho účtu.</h1>

                        <button id="modalCloseButton" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <h6 style="color: red; display: none; align-self: center" id="upozornenie-kosik" >Pre pridanie tovaru do košíka sa musíte prihlásiť.</h6>
                    <div class="modal-body p-5 pt-0">
                        <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                            <div class="form-floating mb-3">
                                <input type="text" name="login" class="form-control rounded-3 text-bg-light " id="login" placeholder="name@example.com" required>
                                <label class="text-black" for="login">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control rounded-3 text-bg-light" id="password" placeholder="Heslo" required>
                                <label class="text-black" for="password">Heslo</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg elegant-button" name="submit" type="submit">Prihlásiť sa</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2">Zaregistrujte sa!</h1>
                        <button id="modalCloseButton" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body p-5 pt-0">
                        <form class="form-register" method="post" action="<?= \App\Config\Configuration::REGISTER_URL ?>">
                            <div class="form-floating mb-3">
                                <input type="text" name="login" class="form-control rounded-3 text-bg-light " id="login" placeholder="name@example.com" required>
                                <label class="text-black" for="login">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control rounded-3 text-bg-light" id="password" placeholder="Heslo má mať minimálne 6 a maximálne 20 znakov." required>
                                <label class="text-black" for="password">Heslo</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg elegant-button" name="submit" type="submit">Prihlásiť sa</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<main>
    <?= $contentHTML ?>
</main>
<div class="container">
    <footer class="py-5 px-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Pomoc</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="?c=home" class="nav-link p-0 text-muted">Domov</a></li>
                    <li class="nav-item mb-2"><a href="?c=home&a=about" class="nav-link p-0 text-muted">O nás</a></li>
                    <li class="nav-item mb-2"><a href="?c=home&a=contact" class="nav-link p-0 text-muted">Kontakt</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Adresa</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-0"><div class="adresa p-0 text-muted">FILAEXIM s.r.o.</div></li>
                    <li class="nav-item mb-0"><div class="adresa p-0 text-muted">Zvolenská cesta 63/A</div></li>
                    <li class="nav-item mb-0"><div class="adresa p-0 text-muted">97405 Banská Bystrica</div></li>
                    <li class="nav-item mb-0"><div class="adresa p-0 text-muted">tel.: +421xxxx34850</div></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <?php
                $errors = [];
                if ($validator->newsletterSignUp($errors)) {
                    ?>
                    <h5>Ďakujeme za odber!</h5>
                    <?php
                }
                else { ?>
                    <form method="POST">
                        <h5>Prihlásiť na odber newslettera</h5>
                        <p>Najnovšie produkty priamo na váš email.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="email-newsletter1" class="visually-hidden">Emailová adresa</label>
                            <input id="email-newsletter1" name="email" type="email" class="form-control" placeholder="Emailová adresa" value="<?=$validator->getParam("email")?>">
                            <button class="btn btn-primary button-style" type="submit">Odoberať</button>
                        </div>
                    </form>
                    <?=$validator->printErrorMessage($errors, "email")?>
                    <a class="nav-link" href="?c=auth&a=newsletter">Pokiaľ sa chcete odlásiť z newslettera, kliknite sem.</a>
                <?php } ?>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2022 Filaexim s.r.o.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
