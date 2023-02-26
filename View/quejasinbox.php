<div class="list-group" id="list-group">
    
</div>
<!-- Please wait -->
<script src="./Assets/dist/js/pleasewait.js"></script>
<script type="text/javascript">
  window.loading_screen = window.pleaseWait({
    logo: "../Images/Logo/cronical_logo_letras_blancas.png",
    backgroundColor: 'rgb(254, 1, 2)',
    loadingHtml: 
    '<p style="color:white; margin:0; paading:0;" class="loading-message">"La única cosa mejor que hacer buenas noticias, es hacer buenas noticias"</p><div class="sk-plane sk-center"></div>'
  });
</script>
<script>
    $(document).ready(function () {
        setTimeout(function (){
            window.loading_screen.finish();
        }, 4000);
        getAll();
    });

    function getAll(){
        $.ajax({
            type: "POST",
            url: "../Business/yomequejoaction.php",
            data: {
                'action': 'getAllWaiting'
            },
            dataType: "json",
            success: function (response) {
                if(response == ""){
                    $('#list-group').html('<div class="list-group-item list-group-item-action">' +
                                                '<p style="color:red">No hay nada en la bandeja de entrada</p>' +  
                                            '</div>');
                }else{
                    var items = "";
                    for (let i = 0; i < response.length; i++) {
                        items += '<div class="list-group-item list-group-item-action">' +
                                        '<div class="d-flex w-100 justify-content-between flex-wrap text-red-dark">' +
                                            '<h5 class="mb-2">'+response[i]['title']+'</h5>' +
                                            '<small class="text-muted">'+response[i]['date']+'</small>' +
                                        '</div>' +
                                        '<p class="mb-2">'+response[i]['description']+'</p>' +
                                        '<small class="text-muted">~'+response[i]['autor']+'</small>' +
                                        '<div class="d-flex w-100 flex-wrap mt-2">' +
                                            '<input type="button" value="Aceptar" class="btn btn-success mx-1" onClick="accept_('+response[i]['id']+')"/>' +
                                            '<input type="button" value="Rechazar" class="btn red-dark" onClick="reject_('+response[i]['id']+')"/>' +
                                        '</div>' +
                                    '</div>';
                    }
                    $('#list-group').html(items);
                }
            }
        });
    }
    function accept_(id){
        $.ajax({
            type: "POST",
            url: "../Business/yomequejoaction.php",
            data: {
                'action': 'accept',
                'id': id
            },
            dataType: "json",
            success: function (response) {
                if(response['message'] == "success"){
                    swal.fire("Aceptada", "La queja aparecerá en la sección de quejas pública", "success");
                    getAll();
                }else{
                    swal.fire("Error", "Ha ocurrido un error al aceptar.", "error");
                }
            }
        });
    }

    function reject_(id){
        $.ajax({
            type: "POST",
            url: "../Business/yomequejoaction.php",
            data: {
                'action': 'reject',
                'id': id
            },
            dataType: "json",
            success: function (response) {
                if(response['message'] == "success"){
                    swal.fire("Rechazada", "La queja fué rechazada exitosamente.", "success");
                    getAll();
                }else{
                    swal.fire("Error", "Ha ocurrido un error al rechazar.", "error");
                }
            }
        });
    }
</script>