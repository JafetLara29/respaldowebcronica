<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sección administrativa | Periodista</title>
  <link rel="shortcut icon" href="./Assets/dist/img/teamcode-transparente.png" type="image/x-icon">
  
  <!-- STYLES -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="./Assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./Assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./Assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./Assets/dist/css/template.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <!-- Loading screen style -->
  <link rel="stylesheet" href="./Assets/dist/css/loadingscreen.css">

  <!-- SCRIPTS -->
  <!-- jQuery -->
  <script src="./Assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap 5 -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
  <!-- AdminLTE App -->
  <script src="./Assets/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="./Assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Data table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <!-- Please wait -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/please-wait/0.0.5/please-wait.css" integrity="sha512-LGdYsyO5vL18FjVLl4X0hpD6YfE/0GhsLu2+Z4W56CM/KlVNvfEe3BkKMFxqnSHEh2RpPF6ZoxHcisQKPbJLwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    -->
    <link rel="stylesheet" href="./Assets/dist/css/pleasewait.css">
    <!-- Spinkit -->
    <link rel="stylesheet" href="./Assets/dist/css/spinkit.css">

</head>

<body class="hold-transition sidebar-mini">
  
  <div class="wrapper">  
    <?php
    include "./Modules/journalistnavbar.php";
    include "./Modules/journalistsidebar.php";
    ?>

    <!-- Contenedor principal, donde vamos a cargas todas las vistas dinamicamente por medio de js -->
    <div class="content-wrapper">
      <?php
      include "journalistdashboard.php";
      ?>
    </div>

    <?php
    include "./Modules/Footer.php";
    ?>
  </div>
  <!-- ./wrapper -->
    
     <!-- Please wait -->
    <script src="./Assets/dist/js/pleasewait.js"></script>
    <script type="text/javascript">
      window.loading_screen = window.pleaseWait({
        logo: "../Images/Logo/cronical_logo_letras_blancas.png",
        backgroundColor: 'rgb(254, 1, 2)',
        loadingHtml: 
        '<p style="color:white; margin:0; paading:0;" class="loading-message">"La única cosa mejor que recibir buenas noticias, es hacer buenas noticias"</p><div class="sk-plane sk-center"></div>'
      });
    </script>
    
  <!-- Script para cargar una pagina deseada por medio de evento onclick, se implementa en las opciones del navbar o sidebar-->
  <script>
    $(document).ready(function() {
        setTimeout(function (){
            window.loading_screen.finish();
        }, 4000);
    });
    
    function loadPage(container, page) {
      $("." + container).load(page);
    }
  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
</body>

</html>