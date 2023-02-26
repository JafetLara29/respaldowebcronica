<div class="card">
    <div class="card-header text-center red-dark">
        <h3 class="card-title text-center">Agregar categoría</h3>
    </div>
    <div class="card-body">
        <form id="form" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de la categoría" required />
            </div>
            <!-- Input hidden de action -->
            <input type="hidden" name="action" value="save">
            <input class="btn btn-success" type="submit" value="Agregar">
        </form>
    </div>
</div>
<script>
    $('#form').submit(function(event) {
        event.preventDefault();
        //Verificamos que todos los campos contengan información
        if($('#name').val() == ''){
            swal.fire("Error!", "Hay campos sin rellenar, por favor ingrese todos los datos que se le solicitan", "error");
        }else{
            $.ajax({
                type: "POST",
                url: "../Business/categoryaction.php",
                data: new FormData(this),
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
                dataType: "json",
                success: function (response) {
                    if(response['message'] == 'success'){
                        swal.fire("Registro exitoso", "Categoría registrada con éxito", "success");
                        $('#form')[0].reset();
                    }else if(response['message'] == 'error'){
                        swal.fire("Error!", "Ha ocurrido un error al registrar la categoría", "error");
                    }else if(response['message'] == 'name-error'){
                        swal.fire("Error!", "Debe ingresar un nombre de categoría", "error");
                    }
                }
            });
        }

    });
</script>