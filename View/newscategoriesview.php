<?php

    include_once "../Business/categorybusiness.php";

    include_once "../Business/newsbusiness.php";

    include_once "../Business/adbusiness.php";

    

    include_once "./header.php";

    $business = new CategoryBusiness();

    $newsBusiness = new NewsBusiness();

    $AdBusiness = new AdBusiness();

    

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    

    <title><?php echo 'Crónica | '.$business->getNameById($_GET['id']) ?></title>

    <meta name="description" content="El diario de la gente">

    

    <meta property="og:type" content="article" />

    <meta property="og:title" content="<?php echo 'Crónica | '.$business->getNameById($_GET['id']) ?>" />

    <meta property="og:description" content="El diario de la gente" />

    <meta property="og:site_name" content="Crónica" />

    

    <meta property="og:url" content="https://crónica.com/" />

    <meta property="og:image" content="https://xn--crnica-cxa.com/Images/Logo/cronical_logo_rojo.png" />

    <meta property="og:image:width" content="1200" />

    <meta property="og:image:height" content="675" />

    

    <!-- Styles sheets -->

    <!-- Styles sheets -->

    <link rel="stylesheet" href="./Assets/dist/css/navbarstyle.css">

    <link rel="stylesheet" href="./Assets/dist/css/footerstyle.css">

    <link rel="stylesheet" href="./Assets/dist/css/responsive.css">

    <link rel="stylesheet" href="./Assets/dist/css/components.css">

    <!-- <link rel="stylesheet" href="./Assets/dist/css/index.css"> -->

    <link rel="stylesheet" href="./Assets/dist/css/newscategoriesstyle.css">

    

    <script src="../View/Assets/plugins/jquery/jquery.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    

    <!-- Tiny Slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



     <!-- google fonts -->

     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- fontawesome -->

    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

</head>



<body>

    

    <div class="space">



    </div>

    <div class="main-add-container text-center">

        <div class="slider-top-limiter">

            <div id="my-slider">

                <?php

                    $ads = $AdBusiness->getAll();

                    foreach($ads as $ad){

                        if(strcmp($ad['page'], "Categorias") == 0 && strcmp($ad['position'], "Arriba") == 0){

                            echo '<div>

                                    <a href="'.$ad['link'].'">

                                        <img class="image" src="../Images/Ads/'.$ad['image'].'" alt="Anuncio">

                                    </a>

                                </div>';

                        }

                    }

                ?>

            </div>

        </div>

    </div>

    <!-- Main Container -->

    <div class="row main-row container-fluid pb-3">

        <!-- publicitary content -->

        <h1 class="title-container"><?php echo $business->getNameById($_GET['id']) ?></h1>

        <!-- Columna de cards de noticias -->

        <div class="col-7 cards-col">

            <?php

                $news = $newsBusiness->getNewsByCategoryId($_GET['id']);

                foreach($news as $new){

                    echo '<div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">

                            <a href="./newsview.php?id='.$new['id'].'">

                                <img style="width:100%" src="../Resources/News-resources/'.$new['image'].'">

                                <div class="hot-topic-content">

                                </div>

                                <div class="text">

                                    <h4>'.$new['title'].'</h4>

                                </div>

                            </a>

                            </div>';

                }

            ?>

        </div>

        <!-- Columna de publicidad -->

        <div class="col rigth-ad mb-2">

            <div id="my-slider2">

                <?php

                    foreach($ads as $ad){

                        if(strcmp($ad['page'], "Categorias") == 0 && strcmp($ad['position'], "Derecha") == 0){

                            echo '<div>

                                    <a href="'.$ad['link'].'">

                                        <img class="image" src="../Images/Ads/'.$ad['image'].'" alt="Anuncio">

                                    </a>

                                </div>';

                        }

                    }

                ?>

            </div>

        </div>

    </div>

    <?php

        include_once "./footer.php";

    ?>





    <!-- scripts -->

    <script src="../JS/script.js" async defer></script>

    <script>

        $(document).ready(function () {

            $(window).scroll(function(){

                // sticky navbar on scroll script

                if(this.scrollY > 30){

                    $('.navigation-container').addClass("sticky");

                    $('.top-head').addClass("sticky");

                    $('.nav-bar').addClass("sticky");

                }else{

                    $('.navigation-container').removeClass("sticky");

                    $('.top-head').removeClass("sticky");

                    $('.nav-bar').removeClass("sticky");

                }

            });

            

        });

    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



    <!-- Script de tiny Slider -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js" integrity="sha512-j+F4W//4Pu39at5I8HC8q2l1BNz4OF3ju39HyWeqKQagW6ww3ZF9gFcu8rzUbyTDY7gEo/vqqzGte0UPpo65QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script>

        // Transicion del navbar al hacer scroll

        $(document).ready(function() {

            // Control de tiny slider

            var slider = tns({

                    container: "#my-slider",

                    items: 1,

                    navAsThumbnails: false,

                    autoplay: true,

                    autoplayTimeout: 3000,

                    swipeAngle: false,

                    speed: 600,

                    mouseDrag: true,

                    controls: false,

                    nav: false,

                    controlsContainer: false,

                    autoplayPosition: false,

                    autoplayButtonOutput: false

                });

        });

        // Slider de la derecha

        var slider2 = tns({

                    container: "#my-slider2",

                    items: 1,

                    navAsThumbnails: false,

                    autoplay: true,

                    autoplayTimeout: 3000,

                    swipeAngle: false,

                    speed: 600,

                    mouseDrag: true,

                    controls: false,

                    nav: false,

                    controlsContainer: false,

                    autoplayPosition: false,

                    autoplayButtonOutput: false

                });

    </script>



    <script>

        AOS.init();

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>



</html>