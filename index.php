<!DOCTYPE html>

<html>



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./Images/Logo/cronical_logo_letras_blancas.png" />

    <title>Noticiero Crónica</title>

    <meta name="description" content="El diario de la gente">

    

    <meta property="og:type" content="article" />

    <meta property="og:title" content="Noticiero Cronica" />

    <meta property="og:description" content="El diario de la gente" />

    <meta property="og:site_name" content="Crónica" />

    

    <meta property="og:url" content="https://crónica.com/" />

    <meta property="og:image" content="https://xn--crnica-cxa.com/Images/Logo/cronical_logo_rojo.png" />

    <meta property="og:image:width" content="1200" />

    <meta property="og:image:height" content="675" />

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <link rel="stylesheet" href="./View/Assets/dist/css/navbarstyle.css">

    <link rel="stylesheet" href="./View/Assets/dist/css/footerstyle.css">

    <link rel="stylesheet" href="./View/Assets/dist/css/responsive.css">

    <link rel="stylesheet" href="./View/Assets/dist/css/index.css">

    <link rel="stylesheet" href="./View/Assets/dist/css/components.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tiny Slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- google fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- fontawesome -->

    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>

    <script src="./View/Assets/plugins/jquery/jquery.min.js"></script>

    <!-- Please wait -->

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/please-wait/0.0.5/please-wait.css" integrity="sha512-LGdYsyO5vL18FjVLl4X0hpD6YfE/0GhsLu2+Z4W56CM/KlVNvfEe3BkKMFxqnSHEh2RpPF6ZoxHcisQKPbJLwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    -->

    <link rel="stylesheet" href="./View/Assets/dist/css/pleasewait.css">

    <!-- Spinkit -->

    <link rel="stylesheet" href="./View/Assets/dist/css/spinkit.css">

    <?php

    include_once "./Business/newsbusiness.php";

    include_once "./Business/categorybusiness.php";

    ?>

</head>



<body>

    

    <section class="inner" ng-view>

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

                        <a href="./View/login.php"><img src="./Images/Logo/cronical_logo_letras_blancas.png" alt=""></a>

    

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

                            <li><a href="./index.php">Inicio</a></li>

                            <li><a href="./View/newscategoriesview.php?id=2">Nacionales</a></li>

                            <li><a href="./View/tourism.php?id=3">Turismo</a></li>
                            
                            <li><a href="./View/newscategoriesview.php?id=6">Regionales</a></li>

                            <li><a href="./View/newscategoriesview.php?id=7">Sucesos</a></li>

                            <li><a href="./View/newscategoriesview.php?id=4">Deportes</a></li>

                            <li class="dropdown">

                                <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                    Espectáculos

                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <div><a class="dropdown-item" href="./View/newscategoriesview.php?id=3">Notas</a></div>

                                    <div><a class="dropdown-item" href="./View/tetengounvieras.php">Te tengo un vieras</a></div>

                                </div>

                            </li>

                            <li><a href="./View/newscategoriesview.php?id=5">Tecnología</a></li>

                            <li><a href="./View/yomequejo.php">Yo me quejo</a></li>

                        </ul>

                    </nav>

                </div>

            </div>

        </header>

        <!--social icons -->

        <div class="social-icons" data-aos="fade-right" data-aos-duration="3000">

            <ul>

                <li>

                    <a href="https://www.facebook.com/cronicacostarica"><i class="fab fa-facebook"></i></a>

                </li>

                <li>

                    <a href="#"><i class="fab fa-tiktok"></i></a>

                </li>

                <li>

                    <a href="#"><i class="fab fa-instagram"></i></a>

                </li>

                <li>

                    <a href="#"><i class="fab fa-twitter"></i></a>

                </li>

            </ul>

        </div>

    

        <!-- Imagen de fondo estatica -->

        <section class="video-container" id="video-container">

            <video src="./Videos/CronicaCortina.mp4" autoplay="true" muted="true" loop="true"></video>

        </section>

        <section data-aos="fade-right" data-aos-duration="3000" class="row banner pt-3 pb-3">

            <div class="col current-new-container">

                <div class="title-container">

                    <h1 class="title"><span class="typing"></span></h1>

                </div>

                <h2>Somos tu proveedor número uno de noticias</h2>

                <button class="btn secondary_color">

                    <a href="./View/showcategoriesview.php">Saber más</a>

                </button>

                <div class="current-news-head">

                    <?php

                    $news = $newsBusiness->getLastTen();
                    if (isset($news)) {

                        for ($i = 0; $i < 4; $i++) {

                            if (isset($news[$i])) {

                                

                                echo '<div data-aos="fade-right" data-aos-duration="3000" class="card border-danger mt-2">

                                            <div class="card-body">

                                                

                                                <h4 class="notice-link"><a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">' . $news[$i]['title'] . '</a></h4>

                                                <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                            </div>

                                        </div>';

                            }

                        }
                    }
                    ?>

                </div>

            </div>

    

            <div class="col popular mt-1">

                <?php

                for ($i = 5; $i < 11; $i++) {

                    if (isset($news[$i])) {

                        echo '

                                <div data-aos="zoom-in-up" data-aos-duration="3000">

                                    <a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=' . $news[$i]['id_category'] . '">' . $categoryBusiness->getNameById($news[$i]['id_category']) . '</a>

                                    <div class = "hot-topic mb-2">

                                        

                                        <a href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                            <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                            <div class = "hot-topic-content">

                                            </div>

                                            <div class="text">

                                                <h4>' . $news[$i]['title'] . '</h4>

                                            </div>

                                        </a>

                                    </div>

                                </div>

                                ';

                    }

                }

                ?>

            </div>

        </section>

    

        <hr>

    

        <main>

            <section class="main-container-left">

                

                <!-- Para imprimir las 10 noticias mas vistas -->

                <div class="container-top-left">

                <?php

                    $news = $newsBusiness->getMostViewNews();

                    if(isset($news)){

                        echo '<div class="title-container">

                                    <h1 class="title"><span class="typing2"></span></h1>

                                </div>';

                    }

                    echo '<div data-aos="zoom-in-up" data-aos-duration="3000" class="my-slider" id="my-slider">';

                    for($i = 0; $i < 10; $i++){

                        if(isset($news[$i])){

                            echo "

                            <div style='overflow: hidden;'>

                                <a class='btn secondary_color text-light' href='./View/newscategoriesview.php?id=" . $news[$i]['id_category'] . "'>" . $categoryBusiness->getNameById($news[$i]['id_category']) . "</a>

                                <a href = './View/newsview.php?id=" . $news[$i]['id'] . "'>

                                    <div>

                                        <img style='width:100%' src='./Resources/News-resources/" . $news[$i]['image'] . "'>

                                    </div>

                                    <div>

                                        <h3 class='notice-link' style='margin: 0; padding-bottom: 3px;' >" . $news[$i]['title'] . "</h3>

                                        <p>".$news[$i]['bajadilla']."</p>

                    

                                    </div>

                                </a>

                            </div>";

                        }

                    }

                    echo "</div>";

                ?>

                </div>

            </section>

            

            <section class="main-container-right">

            <?php 

                $news = $newsBusiness->getLastFiveSportsNews();

                

                if(sizeof($news) > 0){

                    echo '<div class="title-container">

                                <h1 class="title"><span class="typing3"></span></h1>

                            </div>

                    <div class="cards-container">';

                

                    for($i = 0; $i < sizeof($news); $i++){

                        echo '<a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" class="card">

                                    <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">'.$news[$i]['title'].'</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                    }

                    echo '</div>';

    

                    echo '<div class="d-flex justify-content-center mt-4"><a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=4">Ver más</a></div>';

                }

                ?>

            </section>

    

            <section class="main-container-right">

            <?php 

                $news = $newsBusiness->getLastFourNationalNews();

                if(isset($news)){

                    echo '<div class="title-container">

                                <h1 class="title"><span class="typing4"></span></h1>

                            </div>

                    <div class="cards-container">';

                

                    for($i = 0; $i < sizeof($news); $i++){

                        echo '<a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" class="card">

                                    <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">'.$news[$i]['title'].'</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                    }

                echo '</div>';

                echo '<div class="d-flex justify-content-center mt-4"><a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=2">Ver más</a></div>';

                }

                ?>

            </section>

    

            <section class="main-container-right">

            <?php 

                $news = $newsBusiness->getLastFourRegionalNews();

                if(isset($news)){

                    echo '<div class="title-container">

                                <h1 class="title"><span class="typing5"></span></h1>

                            </div>

                    <div class="cards-container">';

                

                    for($i = 0; $i < sizeof($news); $i++){

                        echo '<a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" class="card">

                                    <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">'.$news[$i]['title'].'</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                    }

                echo '</div>';

                echo '<div class="d-flex justify-content-center mt-4"><a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=6">Ver más</a></div>';

    

                }

                ?>

            </section>

    

            <section class="main-container-right">

            <?php 

                $news = $newsBusiness->getLastFourSucesosNews();

                if(isset($news)){

                    echo '<div class="title-container">

                                <h1 class="title"><span class="typing6"></span></h1>

                            </div>

                    <div class="cards-container">';

                

                    for($i = 0; $i < sizeof($news); $i++){

                        echo '<a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" class="card">

                                    <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">'.$news[$i]['title'].'</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                    }

                echo '</div>';

                echo '<div class="d-flex justify-content-center mt-4"><a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=7">Ver más</a></div>';

    

                }

                ?>

            </section>

    

            <section class="main-container-right">

            <?php 

                $news = $newsBusiness->getLastFourEspectaculosNews();

                if(isset($news)){

                    echo '<div class="title-container">

                                <h1 class="title"><span class="typing7"></span></h1>

                            </div>

                    <div class="cards-container">';

                

                    for($i = 0; $i < sizeof($news); $i++){

                        echo '<a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" class="card">

                                    <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">'.$news[$i]['title'].'</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                    }

                echo '</div>';

                echo '<div class="d-flex justify-content-center mt-4"><a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=3">Ver más</a></div>';

    

                }

                ?>

            </section>

    

            <section class="main-container-right">

            <?php 

                $news = $newsBusiness->getLastFourTecnologiaNews();

                if(isset($news)){

                    echo '<div class="title-container">

                                <h1 class="title"><span class="typing8"></span></h1>

                            </div>

                    <div class="cards-container">';

                

                    for($i = 0; $i < sizeof($news); $i++){

                        echo '<a class="notice-link" href = "./View/newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" class="card">

                                    <img style="width:100%" src="./Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">'.$news[$i]['title'].'</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                    }

                echo '</div>';

                echo '<div class="d-flex justify-content-center mt-4"><a class="btn secondary_color text-light" href="./View/newscategoriesview.php?id=5">Ver más</a></div>';

    

                }

                ?>

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

    </section>

    

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    

    <!-- Please wait -->

    <script src="./View/Assets/dist/js/pleasewait.js"></script>

    <script type="text/javascript">

      window.loading_screen = window.pleaseWait({

        logo: "./Images/Logo/cronical_logo_letras_blancas.png",

        backgroundColor: 'rgb(254, 1, 2)',

        loadingHtml: 

            '<p style="color:white; margin:0; paading:0;" class="loading-message">¿Listo para lo mejor en noticias?</p><div class="sk-plane sk-center"></div>'

      });

    </script>

    

    <script src="./JS/script.js" async defer></script>

    <script src="./JS/index.js" async defer></script>

    <!-- Script de tiny Slider -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js" integrity="sha512-j+F4W//4Pu39at5I8HC8q2l1BNz4OF3ju39HyWeqKQagW6ww3ZF9gFcu8rzUbyTDY7gEo/vqqzGte0UPpo65QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





    <script>

        // Transicion del navbar al hacer scroll

        $(document).ready(function() {

            setTimeout(function (){

                window.loading_screen.finish();

                AOS.init();

            }, 3000);

            // Control de tiny slider

            var slider = tns({

                    container: "#my-slider",

                    items: 3,

                    navAsThumbnails: true,

                    autoplay: true,

                    autoplayTimeout: 2000,

                    swipeAngle: false,

                    speed: 400,

                    mouseDrag: true,

                    gutter: 5,

                    controls: false,

                    nav: false,

                    controlsContainer: false,

                    autoplayPosition: false,

                    autoplayButtonOutput: false,

                    responsive: {

                        250: {

                        items: 1,

                        edgePadding: 0

                        },

                        500: {

                        items: 3

                        }

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