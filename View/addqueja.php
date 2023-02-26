<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/dist/css/navbarstyle.css">
    <link rel="stylesheet" href="./Assets/dist/css/footerstyle.css">
    <link rel="stylesheet" href="./Assets/dist/css/responsive.css">
    <link rel="stylesheet" href="./Assets/dist/css/addqueja.css">

    <script src="../View/Assets/plugins/jquery/jquery.min.js"></script>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Scripts de notificaciones emergentes, deben ir en el head para que se muestre el swal que se encuentra en el body -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>
    
    <title>Crónica | Formulario de quejas</title>
</head>
<body>
    <?php
        include_once "./header.php";
    ?>
    <div class="space">

    </div>
    <div class="row text-center p-2">
        <h1>Formulario de quejas</h1>
        <p>Te brindamos la oportunidad de expresar tu queja en este espacio web, sin embargo, le solicitamos que mantenga siempre el respeto al redactar su queja. Este espacio es de acceso para todo público, por lo cual condenamos cualquier tipo de comentario mal intensionado o irrespetuoso.</p>
        <p>Si desea que su queja sea anónima deje el espacio de autor vacío</p>
    </div>

    <div class="row">
        <div class="form-container container">
            <form id="form" action="../Business/yomequejoaction.php">
                <div class="mb-3">
                  <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Asunto" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Redacte su queja aquí:</label>
                    <textarea class="form-control" name="queja" id="queja" required></textarea>
                </div>
                <input type="hidden" name="action" value="save">
                <button type="submit" class="btn secondary_color">Enviar queja</button>
            </form>
        </div>
    </div>
    <script src="../JS/script.js" async defer></script>
    <script>
        $('#form').submit(function(event) {
            event.preventDefault();
            //Verificamos que todos los campos contengan información
            if($('#queja').val() == '' || $('#title').val() == ''){
                swal("Error!", "Hay campos sin rellenar, por favor ingrese todos los datos que se le solicitan", "error");
            }else{
                $.ajax({
                    type: "POST",
                    url: "../Business/yomequejoaction.php",
                    data: new FormData(this),
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    dataType: "json",
                    success: function (response) {
                        if(response['message'] == 'success'){
                            swal("Queja enviada", "Se ha enviado la la información a Crónica para que sea revisada antes de publicarse. Agradecemos tu participación en este espacio.", "success");
                            $('#form')[0].reset();
                        }else if(response['message'] == 'error'){
                            swal("Error!", "Ha ocurrido un error al registrar la queja", "error");
                        }
                    }
                });
            }
        });
        $(window).scroll(function() {
                // sticky navbar on scroll script
                if (this.scrollY > 30) {
                    $('.navigation-container').addClass("sticky");
                    $('.top-head').addClass("sticky");
                    $('.nav-bar').addClass("sticky");
                } else {
                    $('.navigation-container').removeClass("sticky");
                    $('.top-head').removeClass("sticky");
                    $('.nav-bar').removeClass("sticky");
                }
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>