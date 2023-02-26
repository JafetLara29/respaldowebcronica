<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Assets/dist/css/loginStyles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Scripts de notificaciones emergentes, deben ir en el head para que se muestre el swal que se encuentra en el body -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>
  <script src="../JS/sweetalertmessages.js"></script>
  <title>Inicio de sesión</title>
</head>

<body>

  <div class="gradient-custom">

    <div class="container">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <div class="container-logo">
                <!-- logo -->
                <img class="logo" src="../Images/Logo/cronical_logo_letras_blancas.png" alt="">
              </div>
              <h2 class="fw-bold mb-2 text-uppercase">Inicio de Sesión</h2>


              <p class="text-white-50">Por favor ingrese su usuario y contraseña</p>
              <form action="../Business/loginaction.php" method="post">
                <div class="form-outline form-white mb-4">
                  <input type="text" id="typeEmailX" class="form-control form-control-lg" name="username" placeholder="Usuario" required />
                  <!-- <label class="form-label" for="typeEmailX">Usuario</label> -->
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" placeholder="Contraseña" required />
                  <!-- <label class="form-label" for="typePasswordX">Contraseña</label> -->
                </div>

                <input type="hidden" name="action" value="validate">

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Inicio</button>
                <a href="../index.php" class="btn btn-outline-light btn-lg px-5">Salir</a>
              </form>
              <!-- Inputs para mensajes de sweet alert -->
              <?php
              if (isset($_GET['access'])) {
                if (strcmp($_GET['access'], "denegated") == 0) {
                  echo '<input type="hidden" id="message" value="denegated">';
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>