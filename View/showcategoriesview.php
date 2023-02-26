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
    <link rel="stylesheet" href="./Assets/dist/css/components.css">
    <link rel="stylesheet" href="./Assets/dist/css/index.css">
    <link rel="stylesheet" href="./Assets/dist/css/newscategoriesstyle.css">
    
    <script src="../View/Assets/plugins/jquery/jquery.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

     <!-- google fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
        include_once "../Business/categorybusiness.php";
        include_once "../Business/newsbusiness.php";

    ?>
    <title>Categorías</title>
</head>

<body>
    <?php
        include_once "./header.php";
        $business = new CategoryBusiness();
        $newsBusiness = new NewsBusiness();
    ?>
    <!-- Main Container -->
    <div class="row main-row container-fluid">
        <h1 class="title-container">Categorías</h1>
        <!-- Columna de cards de noticias -->
        <div class="col-7 cards-col">
            
            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>

            <div data-aos="zoom-in-up" data-aos-duration="3000" class="hot-topic mb-2" id="">
                    <img src="../Images/Logo/cronical_logo_rojo.png alt=">
                        <div class="hot-topic-content">

                        </div>
                        <div class="text">
                            <h4>Titulo de Categoría</h4>
                            <a class="btn action-btn" href=" ">Ver noticia</a>
                        </div>
            </div>
        
        
        
        
        </div>

        
        <!-- Columna de publicidad -->
        <div class="col">
            <!-- add -->
            <article class="common-add">
                <h4 class="add-header">Publicidad</h4>
                <div>
                    <h2 class="add-mid">Here's how to track your stimulus check with the IRS Get My Payment Portal</h2>

                    <p class="add-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus? </p>
                    <a class="add-link" href="">Mostrar mas</a>
                </div>
                <img class="common-add-img" src="../Images/right-1.jpg">
            </article>

            <!-- add -->
            <article class="common-add">
                <h4 class="add-header">Publicidad</h4>
                <div>
                    <h2 class="add-mid">Here's how to track your stimulus check with the IRS Get My Payment Portal</h2>

                    <p class="add-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus? </p>
                    <a class="add-link" href="">Mostrar mas</a>
                </div>
                <img class="common-add-img" src="../Images/right-1.jpg">
            </article>
        </div>
    </div>
    

    <footer>
            <div class = "footer-container">
                <div class = "footer-left">
                    <h2>Crónica</h2>
                    <p>Sómos el diario del pueblo. Te traemos las noticias más recientes a nivel local y mundial. La noticia oportuna para beneficio y conocimiento del pueblo.</p>
                </div>

                <div class = "footer-right">
                    <h2>Suscríbete</h2>
                    <p>Suscríbete para recibir las últimas noticias al instante</p>
    
                    <div>
                        <a class="btn btn-outline-success" href="./View/subscribeview.php"><i class = "fas fa-envelope"></i>Suscribirse</a>
                    </div>
                </div>
            </div>

            <p>Copyright &copy; 2025 Todos los derechos reservados | Crónica</p>
        </footer>

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
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>