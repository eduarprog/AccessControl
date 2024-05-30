<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f97fcd2c02.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register - AccessControl</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="https://toppng.com/uploads/preview/yukle-wode-svg-png-icon-free-download-registration-ico-11563290294tngylbfqqx.png">
</head>
<body>
<section class="vh-90 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-3 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase"><i class="fa-solid fa-user-plus"></i>&nbsp;Sign Up!</h2>
              <p class="text-white-50 mb-5">Fill out your corresponding information</p>
              <div class="row mb-3">
                <div class="col-6">
                  <div data-mdb-input-init class="form-outline form-white">
                    <input required placeholder="First Name" type="text" name="nombre" id="typeFirstNameX" class="form-control form-control-lg" />
                  </div>
                </div>
                <div class="col-6">
                  <div data-mdb-input-init class="form-outline form-white">
                    <input required type="date" name="fecha_nacimiento" id="typeLastNameX" class="form-control form-control-lg" />
                  </div>
                </div>
              </div>
              <div data-mdb-input-init class="form-outline form-white  mb-3">
                <input required placeholder="Email"  type="email" name="email" id="typeEmailX" class="form-control form-control-lg " />
              </div>
              <div data-mdb-input-init class="form-outline form-white mb-3">
                <input required type="password" placeholder="Password" name="pass" id="typePasswordX" class="form-control form-control-lg" />
              </div>
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <p class="mb-0">Do you have an account?<a href="login.php" class="text-white-50 fw-bold">Log in</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>