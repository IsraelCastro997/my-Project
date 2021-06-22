<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    $request = file_get_contents('http://localhost/my-project/controllers/student.php?o=5&id='.$id_user);
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }
    $nameStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=7&id='.$id_user);
    $codeStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=8&id='.$id_user);
    $paternalSurnameStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=9&id='.$id_user);
    $maternalSurnameStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=10&id='.$id_user);
    $emailStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=11&id='.$id_user);
    $phoneStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=12&id='.$id_user);
    $idCareer = file_get_contents('http://localhost/my-project/controllers/student.php?o=13&id='.$id_user);

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
        <div class="unit-5 overlay" style="background-image: url('images/hero_bg_2.jpg');">
            <div class="container text-center">
                <h2 class="mb-0">Mis proyectos y Favoritos</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-5">
                        <div class="p-4 mb-3 bg-danger text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE <i class="fa fa-user-md fa-2x" aria-hidden="true"></i></h3>
                            <p>El SARS-Cov-2 es muy contagioso, por lo que recomendamos realizar tus juntas o reuniones a través de las siguientes aplicaciones de videoconferencia: Zoom, Google Meet o Teams, así evitamos los contagios.</p>
                        </div>
                    </div>
                </div>
                <div class="site-section bg-light">
                <div class="container">
                    <div class="row justify-content-start text-left mb-5">
                        <div class="col-md-9" data-aos="fade">
                            <h2 class="font-weight-bold text-black">Proyectos</h2>
                        </div>
                        <div class="col-md-3" data-aos="fade" data-aos-delay="200">
                            <a href="./proyecto.php" class="btn btn-primary py-3 btn-block"><span class="h5"><i class="fa fa-plus" aria-hidden="true"></i></span> Publicar</a>
                        </div>
                    </div>
                    <?php
                        echo file_get_contents('http://localhost/my-project/controllers/project.php?o=14&id='.$id_user);
                    ?>
                    <br>
                    <div class="row justify-content-start text-left mb-5">
                        <div class="col-md-9" data-aos="fade">
                            <h2 class="font-weight-bold text-black">Favoritos</h2>
                        </div>
                    </div>
                    <?php
                        echo file_get_contents('http://localhost/my-project/controllers/comment.php?o=5&id='.$id_user);
                    ?><br>
                    <div class="row justify-content-start text-left mb-5">
                        <div class="col-md-9" data-aos="fade">
                            <h2 class="font-weight-bold text-black">Postulaciones</h2>
                        </div>
                    </div>
                    <?php
                        echo file_get_contents('http://localhost/my-project/controllers/comment.php?o=5&id='.$id_user);
                    ?>
                </div>
            </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>