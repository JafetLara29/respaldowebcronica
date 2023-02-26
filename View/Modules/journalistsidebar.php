<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="../Images/Logo/cronical_logo_rojo.png" alt="Logo de usuario" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Crónica</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!--<li class="nav-item">-->
                <!--    <a style="cursor: pointer;" class="nav-link active" id="dash" onclick="loadPage('content-wrapper', './journalistdashboard.php')">-->
                <!--        <i class="nav-icon fas fa-th"></i>-->
                <!--        <p>-->
                <!--            Tablero principal-->
                <!--        </p>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a style="cursor: pointer;" class="nav-link" onclick="loadPage('content-wrapper', './journalistmanagementnewsview.php')">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Administrar noticias
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style="cursor: pointer;" class="nav-link" href="./login.php">
                        <p>
                            Salir
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
<!-- Script para cambiar el color de fondo al elemento que seleccionemos del navbar o sidebar -->
<script>
    $(".nav-link").on('click', function() {
      $(".nav-link").removeClass('active');
      $(this).addClass('active');

    });
  </script>
 