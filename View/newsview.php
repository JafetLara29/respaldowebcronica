<?php

    include_once "../Business/newsbusiness.php";

    include_once "../Business/categorybusiness.php";

    include_once "../Business/filebusiness.php";

    include_once "../Business/adbusiness.php";

    

    $newsBusiness = new NewsBusiness();

    $categoryBusiness = new CategoryBusiness();

    $fileBusiness = new FileBusiness();

    $AdBusiness = new AdBusiness();



    $news = $newsBusiness->getSpecificNews($_GET['id']);

    $category = $news['id_category'];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../Images/Logo/cronical_logo_letras_blancas.png" />

    

    <meta property="og:url"           content="https://www.crónica.com/" />

    <meta property="og:type"          content="article" />

    

    <meta property="og:image"         content="https://xn--crnica-cxa.com/Resources/News-resources/<?php echo $news['image'] ?>" />

    <meta property="og:image:width" content="1200" />

    <meta property="og:image:height" content="675" />

    

    <meta property="og:title" content="<?php echo $news['title'] ?>" />

    <meta property="og:description" content="<?php echo $news['bajadilla'] ?>" />

    

    

    <!-- Styles sheets -->

    <link rel="stylesheet" href="./Assets/dist/css/navbarstyle.css">

    <link rel="stylesheet" href="./Assets/dist/css/footerstyle.css">

    <link rel="stylesheet" href="./Assets/dist/css/responsive.css">

    <link rel="stylesheet" href="./Assets/dist/css/components.css">

    <link rel="stylesheet" href="./Assets/dist/css/shownewsStyles.css">



    <!-- Tiny Slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- google fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- fontawesome -->

    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>

    <script src="./Assets/plugins/jquery/jquery.min.js"></script>



    <title><?php echo $news['title'] ?></title>

    

</head>





<body>

    <div id="fb-root"></div>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0" nonce="IdxwGfls"></script>

    

    <!--script encargado de enviar el id de la noticia para llevar el conteo -->

    <?php

    if (isset($_GET['id'])) {

        echo '<input type="hidden" id="newsid" value="' . $_GET['id'] . '" />';

    }

    ?>



    <?php

    

    include_once "./header.php";

    ?>

    <div class="space">



    </div>

    <!-- publicitary content -->

    <div class="main-add-container text-center">

        <div class="slider-top-limiter">

            <div id="my-slider">

                <?php

                    $ads = $AdBusiness->getAll();

                    foreach($ads as $ad){

                        if(strcmp($ad['page'], "Noticias") == 0 && strcmp($ad['position'], "Arriba") == 0){

                            echo '<div>

                                    <a href="'.$ad['link'].'">

                                        <img class="image" src="../Images/Ads/'.$ad['image'].'" alt="Publicidad">

                                    </a>

                                </div>';

                        }

                    }

                ?>

            </div>

        </div>

    </div>

    

    <!-- Header-->

    <div class="container-fluid">

        <h1 class="main-title"><?php echo $news['title'] ?></h1>

        <p class="bajadilla"> <?php echo $news['bajadilla'] ?></p>

        <p> <?php echo $news['date'] ?></p>

        

        <a class="btn main_color text-light" href="./newscategoriesview.php?id=<?php echo $news['id_category'] ?>"><?php echo $categoryBusiness->getNameById($news['id_category']) ?></a>

    </div>

    

    <!-- Fila principal para columna de parrafo y columna de publicidad -->

    <div class="row container-fluid">

        

        <!-- header news image -->

        <div class="container-fluid principal-ad-container">

            <?php

                echo '<img class="mt-4" style="width:100%" src="../Resources/News-resources/'.$news['image'].'">';

            ?>

        </div>

        <section class="mt-3 ml-1">

            <!--Redes sociales-->

            <a class="btn btn-success" style="padding" href="whatsapp://send?text=https://xn--crnica-cxa.com/View/newsview.php?id=<?php echo $news['id']?>" data-action="share/whatsapp/share"><ion-icon name="logo-whatsapp"></ion-icon> Compartir</a>

            <div class="fb-share-button" data-href="https://xn--crnica-cxa.com/View/newsview.php?<?php echo $news['id'] ?>;" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fxn--crnica-cxa.com%2FView%2Fnewsview.php%3Fid%3D74&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>

        </section>

        <!-- Container with the main news -->

        <div class="col-7 news-paragraph-col">

            

            <p>

                <?php

                echo $news['description'];

                ?>

            </p>

           <!-- Main video container -->

            <div class="news-video-container">

                <?php

                    $files = $fileBusiness->getByNewsId($news['id']);

                    foreach($files as $file){

                        if(strpos($file['type'], "image") !== false){//Si contiene la palabra image: 

                            echo '<img class="mt-3" style="width:100%" src="data:'.$file['type'].';base64,'.$file['file'].'">';

                        }else if(strpos($file['type'], "video") !== false){

                            echo '<video class="mt-3" style="width:100%" src="../Resources/News-resources/'.$file['file'].'" controls>El video no es soportado por su navegador. Haga click aquí para descargarlo</video>';

                        }else if(strpos($file['type'], "audio") !== false){

                            echo '<audio class="mt-3" style="width:100%" src="data:'.$file['type'].';base64,'.$file['file'].'" controls>El video no es soportado por su navegador. Haga click aquí para descargarlo</audio>';

                        }

                    }

                ?>

                <!-- <video controls src="../Videos/Estos son los índices que se desplomaron en un lunes negro para la economía - Noticias Telemundo_2.mp4" muted="true">

                </video> -->

            </div>

        </div>



        <!-- rigth ads -->

        <div class="col mb-5">

            <!-- Publicidad -->

            <div class="col rigth-ad mb-2">

                <div id="my-slider2">

                    <?php

                        foreach($ads as $ad){

                            if(strcmp($ad['page'], "Noticias") == 0 && strcmp($ad['position'], "Derecha") == 0){

                                echo '<div>

                                        <a href="'.$ad['link'].'">

                                            <img class="image" src="../Images/Ads/'.$ad['image'].'" alt="Publicidad">

                                        </a>

                                    </div>';

                            }

                        }

                    ?>

                </div>

            </div>

            

            



        </div>



    </div>

    

    <!-- Fila para sugerencias de categoria -->

    <div class="row container-fluid mb-3">

        <!--Seccion de ultimas noticias-->

            <div class="title-container mt-4">

                <h1 class="title"><span class="typing3"></span></h1>

            </div>

            <div class="d-flex justify-content-evenly flex-wrap">

                <?php

                $news = $newsBusiness->getLastTen();

                for ($i = 0; $i < 3; $i++) {

                    if (isset($news[$i])) {

                        echo '<div data-aos="fade-right" data-aos-duration="3000" class="card card-top-news border-danger mt-2">

                                    <div class="card-body">

                                        <h4 class="notice-link"><a class="notice-link" href = "./newsview.php?id=' . $news[$i]['id'] . '">' . $news[$i]['title'] . '</a></h4>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                              

                                </div>';

                    }

                }

                ?>

                

            </div>

    <?php 

        $news = $newsBusiness->getFiveNewsByCategoryId($category);

        if(isset($news)){

            echo '<div class="title-container">

                    <h1 class="title">Noticias relacionadas</h1>

                </div>

            <div class="d-flex justify-content-evenly flex-wrap">';



            for ($i = 0; $i < 5; $i++) {

                if(isset($news[$i]['id'])){

                    echo '<a class="notice-link" href = "./newsview.php?id=' . $news[$i]['id'] . '">

                                <div data-aos="zoom-in-up" data-aos-duration="3000" style="width:300px; height:350px;" class="card card-suggestion mb-2">

                                    <img style="width:100%" src="../Resources/News-resources/' . $news[$i]['image'] . '">

                                    <div>

                                        <h2 class="notice-link">' . $news[$i]['title'] . '</h2>

                                        <p>' . $news[$i]['bajadilla'] . ' |' . $news[$i]['date'] . '</p>

                                    </div>

                                </div>

                            </a>';

                }

            }

            echo '</div>';

        }

    ?>

    </div>

    

    <!-- Footer -->

    <?php

    include_once "./footer.php";

    ?>



    <script src="../JS/script.js" async defer></script>



    <!-- Script de tiny Slider -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js" integrity="sha512-j+F4W//4Pu39at5I8HC8q2l1BNz4OF3ju39HyWeqKQagW6ww3ZF9gFcu8rzUbyTDY7gEo/vqqzGte0UPpo65QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

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

                // Slider de la derecha

                var slider = tns({

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

        var typed = new Typed(".typing3", {

            strings: ["Últimas noticias"],

            typeSpeed: 100,

            backSpeed: 60,

            loop: true

        });

    </script>

    <script src="../JS/visit.js"></script>

    <!-- scripts -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>



</html>