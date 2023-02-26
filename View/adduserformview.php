<div class="card">
    <div class="card-header text-center red-dark">
        <h3 class="card-title text-center">Agregar usuario</h3>
    </div>
    <div class="card-body">
        <form id="form" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="password" id="password" placeholder="Contraseña">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tipo de usuario</label>
                <select class="form-control" name="user_type" id="user_type">
                    <option>Seleccionar</option>
                    <option>master</option>
                    <option>reportero</option>
                </select>
            </div>
            <input class="btn btn-success" type="submit" value="Agregar">
        </form>
    </div>
</div>
<script>
    $('#form').submit(function(event) {
        event.preventDefault();
        //Verificamos que todos los campos contengan información
        if($('#username').val() == '' || $('#password').val() == '' || $('#user_type').val() == 'Seleccionar'){
            swal.fire("Error!", "Hay campos sin rellenar, por favor ingrese todos los datos que se le solicitan", "error");
        }else{
            $.ajax({
                type: "POST",
                url: "../Business/useraction.php",
                data: {
                    'action': 'save',
                    'username': $("#username").val(),
                    'password': $("#password").val(),
                    'user_type': $("#user_type").val()
                },
                dataType: "json",
                success: function (response) {
                    if(response['message'] == 'success'){
                        swal.fire("Registro exitoso", "Usuario registrado con éxito", "success");
                        $("#username").val('');
                        $("#password").val('');
                        $("#user_type").val('Seleccionar');
                    }else if(response['message'] == 'error'){
                        swal.fire("Error!", "Ha ocurrido un error al registrar al usuario", "error");
                    }
                }
            });
        }

    });
</script>