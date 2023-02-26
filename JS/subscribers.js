
$(document).ready(function () {

    $('#forms').submit(function (e) {

        e.preventDefault();
        var is_checked = ($("#privacypolicy").is(':checked')) ? true : false;

        if ($("#subscriber_name").empty() && $("#subscriber_email").empty() && is_checked === false) {
            Toastify({
                text: "¡Hay campos vac\u00EDos!",
                duration: 1500,
                gravity: "top",
                position: "center",
                style: {
                    backgroundColor: "linear-gradient(to right, red, orange)",
                },

            }).showToast();

        } else if ($("#subscriber_name").val() != null && $("#subscriber_email").val() != null && is_checked === true) {

            let name = $("#subscriber_name").val();
            let email = $("#subscriber_email").val();

            if (validateName(name) === true && validateEmail(email) === true) {
                console.log(`Nombre ${name} y correo ${email}`);
                sendSubscriber(name, email);
            } else {
                console.log(`Introduce la informacion correctamente!!!`);
                Toastify({
                    text: "¡Introduce la informaci\u00F3n correctamente!",
                    duration: 1500,
                    gravity: "top",
                    position: "center",
                    style: {
                        backgroundColor: "linear-gradient(to right, red, orange)",
                    },

                }).showToast();

                $("#subscriber_name").val('');
                $("#subscriber_email").val('');
                $("#privacypolicy").prop('checked', false);
            }
        }
    });
});

function validateName(name) {
    var regex_name = new RegExp(/^[a-zA-Z0-9 ]+$/);
    return (regex_name.test(name)) ? true : false;
}

function validateEmail(email) {
    var regex_email = new RegExp(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
    return (regex_email.test(email)) ? true : false;
}

function sendSubscriber(name, email) {
    $.ajax({
        url: "../Business/subscriberaction.php",
        type: "POST",
        data: { subscribername: name, subscriberemail: email, action: 'addsubscriber' },
        success: function (response) {
            console.log(response);
            if (response === 'success') {
                showMessage("¡Subscrito exitosamente!");
                console.log(response);

                $("#subscriber_name").val('');
                $("#subscriber_email").val('');
                $("#privacypolicy").prop('checked', false);

            } else if(response === "exists") {
                showMessage("¡Ya existe un correo similar, pruebe con otro!");
                console.log(response);

                $("#subscriber_name").val('');
                $("#subscriber_email").val('');
                $("#privacypolicy").prop('checked', false);
            }else{
                console.log(response);
                showMessage("¡Ocurrio un error!");
                
                $("#subscriber_name").val('');
                $("#subscriber_email").val('');
                $("#privacypolicy").prop('checked', false);
            }
        }
    });
}

function showMessage(message) {
    Toastify({
        text: message,
        duration: 1500,
        gravity: "top",
        position: "center"
    }).showToast();
}