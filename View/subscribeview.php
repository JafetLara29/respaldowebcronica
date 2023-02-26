<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Boletin de Suscripci&oacute;n</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/dist/css/subscribeviewstyle.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="./Assets/plugins/jquery/jquery.min.js"></script>
</head>

<body>
    <div class="container-sub">
        <div class="content-sub">
            <h2 class="text-center">Suscr&iacute;bete a nuestro bolet&iacute;n</h2>
            <p class="text-center">Sin promesas de spam, ¡solo nuestras &uacute;ltimas noticias!</p>
            <form id="forms" method="POST" action="">
                <div class="mb-3">
                    <label for="disabledNameInput" class="form-label"></label>
                    <input type="name" id="subscriber_name" class="form-control" placeholder="Nombre completo" required>
                </div>
                <div class="mb-3">
                    <label for="disabledEmailInput" class="form-label"></label>
                    <input type="email" id="subscriber_email" class="form-control" placeholder="Correo electr&oacute;nico" required>
                </div>
                <div class="text-light">
                    <small>Si activa la siguiente opción declara que acepta nuestras</small>
                    <a href="">politicas de privacidad</a>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="privacypolicy" required>
                    <label class="form-check-label" for="exampleCheck1">Acepto</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary red">Suscribirse</button>
                    <a class="btn btn-dark" href="../index.php">Volver</a>
                </div>

            </form>
        </div>
    </div>


    <script src="../JS/subscribers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>