<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }
    $nameStudent = file_get_contents('http://localhost/my-project/controllers/student.php?o=7&id='.$id_user);
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
            <div class="site-blocks-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row row-custom align-items-center">
                        <div class="col-md-10">
                            <h1 class="mb-2 text-black w-75"><span class="font-weight-bold"><?php echo trim($nameStudent); ?>, tu proximo equipo de modulares</span> está aquí.</h1>
                            <div class="job-search">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active py-3" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="true">Buscar un proyecto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3" id="pills-candidate-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-candidate" aria-selected="false">Busca con otros parametros</a>
                                    </li>
                                </ul>
                                <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <div class="select-wrap">
                                                        <span class="fa fa-angle-down arrow-down"></span>
                                                        <select name="" id="" class="form-control" required="true">
                                                            <option value="">División</option>
                                                            <option value="ciencias_basicas">Ciencias Básicas</option>
                                                            <option value="ingenierias">Ingenierías</option>
                                                            <option value="electronica_computacion">Electronica y Computación</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <div class="select-wrap">
                                                        <span class="fa fa-angle-down arrow-down"></span>
                                                        <select name="" id="" class="form-control" required="true">
                                                            <option value="">Prioridad</option>
                                                            <option value="bajo">Bajo</option>
                                                            <option value="normal">Normal</option>
                                                            <option value="alto">Alto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <div class="select-wrap">
                                                        <span class="fa fa-angle-down arrow-down"></span>
                                                        <select name="" id="" class="form-control" required="true">
                                                            <option value="">Horario</option>
                                                            <option value="matunino">Matunino</option>
                                                            <option value="vespertino">Vespertino</option>
                                                            <option value="semana_estudiantil">Semana Estudiantil</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <div class="select-wrap">
                                                        <span class="fa fa-angle-down arrow-down"></span>
                                                        <select name="" id="" class="form-control" required="true">
                                                            <option value="">Experiencia</option>
                                                            <option value="ninguna">Ninguna</option>
                                                            <option value="junior">Junior</option>
                                                            <option value="senior">Senior</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                   <input type="submit" class="btn btn-primary btn-block" value="Buscar">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-candidate" role="tabpanel" aria-labelledby="pills-candidate-tab">
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <input type="text" class="form-control" placeholder="eg. Carl Smith">
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <div class="select-wrap">
                                                        <span class="fa fa-angle-down arrow-down"></span>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Category</option>
                                                            <option value="fulltime">Full Time</option>
                                                            <option value="fulltime">Part Time</option>
                                                            <option value="freelance">Freelance</option>
                                                            <option value="internship">Internship</option>
                                                            <option value="internship">Termporary</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Location" onFocus="geolocate()">
                                                </div>
                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Search">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section bg-light">
                <div class="container">
                    <div class="row justify-content-start text-left mb-5">
                        <div class="col-md-9" data-aos="fade">
                            <h2 class="font-weight-bold text-black">Recientes proyectos</h2>
                        </div>
                        <div class="col-md-3" data-aos="fade" data-aos-delay="200">
                            <a href="./proyecto.php" class="btn btn-primary py-3 btn-block"><span class="h5"><i class="fa fa-plus" aria-hidden="true"></i></span> Publicar</a>
                        </div>
                    </div>

                    <?php echo file_get_contents("http://localhost/my-project/controllers/project.php?o=2"); ?>
                    
                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <li><a>...</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>