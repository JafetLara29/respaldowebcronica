//SCRIPT PARA LLEVAR EL CONTROL DE LAS VISITAS DE LAS PUBLICACIONES
$(document).ready(function () {
    $.ajax({
        url: "../Business/visitaction.php",
        type: 'POST',
        data: { news_id: $("#newsid").val(), action: 'visit' },
        success: function (res) {
            console.log(res);
        }
    });
})

