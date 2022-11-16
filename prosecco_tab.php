<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prosecco</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="public/css/hlavna_styl.css" rel="stylesheet">
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
          <a class="nav-link" href="prosecco_tab.html">Prosecco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Víno</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Spritz Aperitív</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Olivový olej</a>
        </li>
      </ul>
      <div class="d-flex justify-content-center">
        <form class="d-flex" role="search">
          <input class="form-control me-2 flex" type="search" placeholder="Hľadanie v obchode..." aria-label="Search">
          <button class="btn button-style disabled" type="submit">Hľadať</button>
        </form>
        <div class="text-end ps-2">
          <button type="button" class="btn btn-outline-primary me-2 login-button" data-bs-target="#loginModal" data-bs-toggle="modal">Prihlásiť sa</button>
        </div>
      </div>

    </div>

    <div class="logo-header-wrapper" >
      <div class="logo logo-header">
        <a style="text-decoration: none" class="logo" href="indexik.php" target="_self">ProseccoStore</a>
      </div>
    </div>


  </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
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
          <button class="w-100 mb-2 btn btn-lg elegant-button disabled" type="submit">Prihlásiť sa</button>

        </form>
      </div>
    </div>
  </div>
</div>

<main>
  <div class="container-text">
    <img class="img-fluid titulka" src="public/images/pictures/prosecco-main.jpg" alt="Víno na kopci" >
    <div class="text-nowrap middle-text">
      Prosecco.
    </div>
  </div>
  <div class="px-2 pt-2 my-5 pb-3 text-center border-bottom">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-2">
          <h1 class="display-6 ">Filtre</h1>
          <h5 class="">Tu budú filtre</h5>
        </div>
        <div class="col-sm-10">
          <div class="album py-5 bg-light">
            <div class="container">
              <div class="col-lg-10 mx-auto ">
                <div class="row row-cols-5 row-cols-md-3 g-6 px-5 pt-2 ">
                  <div class="col pb-4">
                    <a href="#" class="nav-link">
                      <div class="card h-100">
                        <img src="public/images/pictures/prosecco-example.png" class="card-img-top pt-2" alt="prosecco">
                        <div class="card-body">
                          <h5 class="card-title">Montelliana - Prosecco DOC Treviso Frizzante Spago</h5>
                        </div>
                        <div class="card-footer">
                          <small class="text-nowrap price">4.60€</small>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="#" class="nav-link">
                      <div class="card h-100">
                        <img src="public/images/pictures/prosecco-example.png" class="card-img-top pt-2" alt="prosecco">
                        <div class="card-body">
                          <h5 class="card-title">Montelliana - Prosecco DOC Treviso Frizzante Spago</h5>
                        </div>
                        <div class="card-footer">
                          <small class="text-nowrap price">4.60€</small>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="#" class="nav-link">
                      <div class="card h-100">
                        <img src="public/images/pictures/prosecco-example.png" class="card-img-top pt-2" alt="prosecco">
                        <div class="card-body">
                          <h5 class="card-title">Montelliana - Prosecco DOC Treviso Frizzante Spago</h5>
                        </div>
                        <div class="card-footer">
                          <small class="text-nowrap price">4.60€</small>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="#" class="nav-link">
                      <div class="card h-100">
                        <img src="public/images/pictures/prosecco-example.png" class="card-img-top pt-2" alt="prosecco">
                        <div class="card-body">
                          <h5 class="card-title">Montelliana - Prosecco DOC Treviso Frizzante Spago</h5>
                        </div>
                        <div class="card-footer">
                          <small class="text-nowrap price">4.60€</small>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="#" class="nav-link">
                      <div class="card h-100">
                        <img src="public/images/pictures/prosecco-example.png" class="card-img-top pt-2" alt="prosecco">
                        <div class="card-body">
                          <h5 class="card-title">Montelliana - Prosecco DOC Treviso Frizzante Spago</h5>
                        </div>
                        <div class="card-footer">
                          <small class="text-nowrap price">4.60€</small>
                        </div>
                      </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<div class="container">
  <footer class="py-5 px-5">
    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Pomoc</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="indexik.php" class="nav-link p-0 text-muted">Domov</a></li>
          <li class="nav-item mb-2"><a href="o-nas.php" class="nav-link p-0 text-muted">O nás</a></li>
          <li class="nav-item mb-2"><a href="kontakt.php" class="nav-link p-0 text-muted">Kontakt</a></li>
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
        <form>
          <h5>Prihlásiť na odber newslettera</h5>
          <p>Najnovšie produkty priamo na váš email.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Emailová adresa</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Emailová adresa">
            <button class="btn btn-primary button-style" type="button">Odoberať</button>
          </div>
        </form>
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