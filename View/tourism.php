<!DOCTYPE html>

<html>



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../Images/Logo/cronical_logo_letras_blancas.png" />

    <title>Noticiero Crónica</title>

    <meta name="description" content="El diario de la gente">

    

    <meta property="og:type" content="article" />

    <meta property="og:title" content="Noticiero Cronica" />

    <meta property="og:description" content="El diario de la gente" />

    <meta property="og:site_name" content="Crónica" />

    

    <meta property="og:url" content="https://cronica.cr/" />

    <meta property="og:image" content="https://cronica.cr/Images/Logo/cronical_logo_rojo.png" />

    <meta property="og:image:width" content="1200" />

    <meta property="og:image:height" content="675" />

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <link rel="stylesheet" href="./Assets/dist/css/navbarstyle.css">

    <link rel="stylesheet" href="./Assets/dist/css/footerstyle.css">

    <link rel="stylesheet" href="./Assets/dist/css/tourismresponsive.css">

    <link rel="stylesheet" href="./Assets/dist/css/tourism.css">

    <link rel="stylesheet" href="./Assets/dist/css/components.css">

    <link rel="stylesheet" href="./Assets/dist/css/newscategoriesstyle.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tiny Slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- google fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- fontawesome -->

    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>

    <script src="../View/Assets/plugins/jquery/jquery.min.js"></script>
    
    <!-- Spinkit -->
    <link rel="stylesheet" href="./Assets/dist/css/spinkit.css">



    <?php

    include_once "../Business/newsbusiness.php";

    include_once "../Business/categorybusiness.php";

    ?>

</head>



<body>

    <?php

    $newsBusiness = new NewsBusiness();

    $categoryBusiness = new CategoryBusiness();

    ?>

    <!-- header -->

    <header>

        <div class="navigation-container">

            <div class="top-head">

                <div class="web-name">

                    <!-- Logo Cronica -->

                    <a href="./View/login.php"><img src="../Images/Logo/cronical_logo_letras_blancas.png" alt=""></a>



                </div>

                <div class="ham-btn">

                    <span>

                        <i class="fas fa-bars"></i>

                    </span>

                </div>



                <div class="times-btn">

                    <span>

                        <i class="fas fa-times"></i>

                    </span>

                </div>

            </div>



            <!-- nav bar -->



            <div class="nav-bar" id="nav-bar">

                <nav>

                    <ul>

                        <li><a href="../index.php">Inicio</a></li>

                        <li><a href="../View/newscategoriesview.php?id=2">Nacionales</a></li>

                        <li><a href="../View/newscategoriesview.php?id=6">Regionales</a></li>

                        <li><a href="../View/newscategoriesview.php?id=7">Sucesos</a></li>

                        <li><a href="../View/newscategoriesview.php?id=4">Deportes</a></li>
                        
                        <li class="dropdown">

                            <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                Espectáculos

                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                <div><a class="dropdown-item" href="./View/newscategoriesview.php?id=3">Notas</a></div>

                                <div><a class="dropdown-item" href="./View/tetengounvieras.php">Te tengo un vieras</a></div>

                            </div>

                        </li>

                        <li><a href="../View/newscategoriesview.php?id=5">Tecnología</a></li>

                        <li><a href="../View/yomequejo.php">Yo me quejo</a></li>

                    </ul>

                </nav>

            </div>

        </div>

    </header>

    <!-- Imagen de fondo estatica -->
    <section class="video-container" id="video-container">
        <video src="../Videos/tourismVideo.mp4" autoplay="true" muted="true" loop="true"></video>
    </section>
    <main>
        <!-- Main Container -->
        <section data-aos="fade-right" data-aos-duration="3000" class="main-container-left">

            <!-- publicitary content -->

            <!-- <h1 class="title-container"><?php //echo $business->getNameById($_GET['id']) ?></h1> -->
            <div class="title-container">

                <h1 class="title"><span class="typing"></span></h1>

            </div>

            <!-- Columna de cards de noticias -->
            <div class="cards-col">
                <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <a href="./newsview.php?id='.$new['id'].'">
                        <img style="width:100%" src="../Resources/News-resources/22_08_15_1660600646_WhatsApp Image 2022-08-11 at 8.34.50 PM.jpeg">
                        <div class="hot-topic-content">
                        </div>
                        <div class="text">
                            <h4>Gran lugar para visitar con tu familia en el canton de sarapiqui</h4>
                        </div>
                    </a>
                </div>

                <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <a href="./newsview.php?id='.$new['id'].'">
                        <img style="width:100%" src="../Resources/News-resources/22_08_15_1660600646_WhatsApp Image 2022-08-11 at 8.34.50 PM.jpeg">
                        <div class="hot-topic-content">
                        </div>
                        <div class="text">
                            <h4>Gran lugar para visitar con tu familia en el canton de sarapiqui</h4>
                        </div>
                    </a>
                </div>
                <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <a href="./newsview.php?id='.$new['id'].'">
                        <img style="width:100%" src="../Resources/News-resources/22_08_15_1660600646_WhatsApp Image 2022-08-11 at 8.34.50 PM.jpeg">
                        <div class="hot-topic-content">
                        </div>
                        <div class="text">
                            <h4>Gran lugar para visitar con tu familia en el canton de sarapiqui</h4>
                        </div>
                    </a>
                </div>
                <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <a href="./newsview.php?id='.$new['id'].'">
                        <img style="width:100%" src="../Resources/News-resources/22_08_15_1660600646_WhatsApp Image 2022-08-11 at 8.34.50 PM.jpeg">
                        <div class="hot-topic-content">
                        </div>
                        <div class="text">
                            <h4>Gran lugar para visitar con tu familia en el canton de sarapiqui</h4>
                        </div>
                    </a>
                </div>
                <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <a href="./newsview.php?id='.$new['id'].'">
                        <img style="width:100%" src="../Resources/News-resources/22_08_15_1660600646_WhatsApp Image 2022-08-11 at 8.34.50 PM.jpeg">
                        <div class="hot-topic-content">
                        </div>
                        <div class="text">
                            <h4>Gran lugar para visitar con tu familia en el canton de sarapiqui</h4>
                        </div>
                    </a>
                </div>
            </div>

        </section>
    </main>

    <footer>

        <div class="footer-container">

            <div class="footer-left">

                <h2>Crónica</h2>

                <p>Sómos el diario del pueblo. Te traemos las noticias más recientes a nivel local y mundial. La noticia oportuna para beneficio y conocimiento del pueblo.</p>

            </div>



            <div class="footer-right">

                <h2>Suscríbete</h2>

                <p>Suscríbete para recibir las últimas noticias al instante</p>



                <div>

                    <a class="btn btn-outline-success" href="./View/subscribeview.php"><i class="fas fa-envelope"></i> Suscribirse</a>

                </div>

            </div>

        </div>



        <p>Copyright &copy; 2025 Todos los derechos reservados | Crónica</p>

    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="../JS/script.js" async defer></script>

    <script src="../JS/tourism.js" async defer></script>

    <!-- Script de tiny Slider -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js" integrity="sha512-j+F4W//4Pu39at5I8HC8q2l1BNz4OF3ju39HyWeqKQagW6ww3ZF9gFcu8rzUbyTDY7gEo/vqqzGte0UPpo65QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





    <script>

        // Transicion del navbar al hacer scroll

        $(document).ready(function() {

            AOS.init();

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

            

        });



    </script>

    

    <!-- Scripts de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- Icons -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>



</html>