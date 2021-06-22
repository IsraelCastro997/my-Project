<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include './html/head.php'; ?>
    <body>
        <div class="site-wrap">
            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <?php include './html/navigation.php'; ?>
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-7 text-center">
                            <h2 class="font-weight-bold text-black" data-aos="fade">Desarrolladores</h2>
                            <p>Estudiantes de la carrera de Ingeniería en informática, especializados en la programación web e Inteligencia Artificial</p>
                        </div>
                        <div class="row top-destination">
                            <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade">
                                <a href="#" class="place">
                                    <img src="images/jazmin.png" alt="Image placeholder">
                                    <h2>Jazmin Rodriguez Reveles</h2>
                                    <p>Desarrolladora Full-stack</p>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade">
                                <a href="#" class="place">
                                    <img src="images/Damian.png" alt="Image placeholder">
                                    <h2>Damian Castro</h2>
                                    <p>Lider, Desarrolladora Full-stack</p>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade">
                                <a href="#" class="place">
                                    <img src="images/eli.png" alt="Image placeholder">
                                    <h2>Elida Ayala Guerrero</h2>
                                    <p>Desarrolladora Full-stack y documentadora</p>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade">
                                <a href="#" class="place">
                                    <img src="images/person_3.jpg" alt="Image placeholder">
                                    <h2></h2>
                                    <p>Primer Asesor</p>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade">
                                <a href="#" class="place">
                                    <img src="images/alvaro.png" alt="Image placeholder">
                                    <h2>Alvaro Barrera García</h2>
                                    <p>Segundo Asesor</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>