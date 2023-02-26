<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles sheets -->
    <!-- Styles sheets -->
    <link rel="stylesheet" href="./Assets/dist/css/navbarstyle.css">
    <link rel="stylesheet" href="./Assets/dist/css/footerstyle.css">
    <link rel="stylesheet" href="./Assets/dist/css/responsive.css">
    <link rel="stylesheet" href="./Assets/dist/css/yomequejo.css">
    
    <script src="../View/Assets/plugins/jquery/jquery.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tiny Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- google fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
        include_once "../Business/categorybusiness.php";
        include_once "../Business/newsbusiness.php";
        include_once "../Business/adbusiness.php";
    ?>
    <title>Crónica | Yo me quejo</title>
</head>

<body>
    <?php
        include_once "./header.php";
        $business = new CategoryBusiness();
        $newsBusiness = new NewsBusiness();
        $AdBusiness = new AdBusiness();
    ?>
    <div class="space">

    </div>
    <div class="row text-center p-2">
        <h1>Yo me quejo</h1>
        <p>Yo me quejo es una sección pensada para las personas del pueblo. En esta sección se abre un espacio para que las personas de la comunidad se expresen y hagan saber su descontento respecto temas de su comunidad o del país en general.</p>
        <p>¿Tienes alguna queja que expresarnos? | <a href="./addqueja.php" class="btn border-danger">Quéjate aquí</a></p>
    </div>
    <!-- Main Container -->
    <div class="row main-row pb-3 mt-5">
       <!-- Columna de las quejas -->
        <div class="col-7 cards-col" id="cards-col">
            <div class="list-group" id="list-group">
        
            </div>
        </div>
        <!-- Columna de publicidad -->
        <div class="col rigth-ad mb-2">
            <div id="my-slider2">
                <?php
                    $ads = $AdBusiness->getAll();
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

            // Traemos las quejas
            $.ajax({
                type: "POST",
                url: "../Business/yomequejoaction.php",
                data: {
                    'action': 'getAllAccepted'
                },
                dataType: "json",
                success: function (response) {
                    if(response == ''){
                        $('#list-group').html('<a href="" class="list-group-item list-group-item-action">' +
                                                '<p style="color:red">No hay quejas hechas. Puedes ser el primero en quejarte!!</p>' +  
                                            '</a>');
                    }else{
                        var items = "";
                        for (let i = 0; i < response.length; i++) {
                            items += '<a data-aos="zoom-in-up" data-aos-duration="3000" href="#" class="list-group-item list-group-item-action mb-4">' +
                                            '<div class="d-flex w-100 justify-content-between flex-wrap text-red-dark">' +
                                                '<h5 class="mb-2">'+response[i]['title']+'</h5>' +
                                                '<small class="text-muted">'+response[i]['date']+'</small>' +
                                            '</div>' +
                                            '<p class="mb-2">'+response[i]['description']+'</p>' +
                                            '<small class="text-muted">~'+response[i]['autor']+'</small>' +
                                            
                                        '</a>';
                        }
                        $('#list-group').html(items);
                    }
                }
            });
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
    <script>
        AOS.init();
    </script>
    <!-- Script de tiny Slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js" integrity="sha512-j+F4W//4Pu39at5I8HC8q2l1BNz4OF3ju39HyWeqKQagW6ww3ZF9gFcu8rzUbyTDY7gEo/vqqzGte0UPpo65QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>