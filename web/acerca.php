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
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-md-6" data-aos="fade">
                            <h2 class="text-black">¿Porqué <strong>my-project</strong>? </h2>
                        </div>
                    </div>
                    <div class="row hosting">
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <div class="unit-3-icon-wrap mr-4">
                                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                        </svg>
                                        <span class="unit-3-icon icon fa fa-university"></span>
                                    </div>
                                    <h2 class="h5">Miles de proyectos escolares</h2>
                                </div>
                                <div class="unit-3-body">
                                    <p>Los proyectos modulares nos ayudan a demostrar nuestra experiencia y habilidades, busca en que proyectos puedes aplicar tu experiencia académica para afrontar o conocer los problemas del área laboral.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="200">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <div class="unit-3-icon-wrap mr-4">
                                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                        </svg>
                                        <span class="unit-3-icon icon fa fa-tasks"></span>
                                    </div>
                                    <h2 class="h5">Búsqueda por división</h2>
                                </div>
                                <div class="unit-3-body">
                                    <p>Sabias que los proyectos modulares del CUCEI son extra disciplinarías, es decir, que puedes trabajar con otras carreras, no necesariamente de tu carrera,  aquí encontraras todas las divisiones y carreras del CUCEI, encuentra la que más se adapte a ti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="300">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <div class="unit-3-icon-wrap mr-4">
                                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                        </svg>
                                        <span class="unit-3-icon icon fa fa-user-plus"></span>
                                    </div>
                                    <h2 class="h5">Búsqueda por experiencia</h2>
                                </div>
                                <div class="unit-3-body">
                                    <p>Hay compañeros que tienen mas experiencia en su carrera, busca a compañeros estudiantes que ya hayan trabajado o solucionado un problema en concreto y únete con ellos, así su equipo será el más competitivo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="400">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <div class="unit-3-icon-wrap mr-4">
                                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                        </svg>
                                        <span class="unit-3-icon icon fa fa-calendar"></span>
                                    </div>
                                    <h2 class="h5">Busca tu tiempo libre</h2>
                                </div>
                                <div class="unit-3-body">
                                    <p>Sabemos que los proyectos modulares sumados con nuestras clases particulares, son un verdadero dolor de cabeza, te recomendamos que midas tu tiempo libre y busques estudiantes que también busquen un espacio libre para platicar sobre su proyecto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="500">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <div class="unit-3-icon-wrap mr-4">
                                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                        </svg>
                                        <span class="unit-3-icon icon fa fa-exclamation"></span>
                                    </div>
                                    <h2 class="h5">Busca la importancia</h2>
                                </div>
                                <div class="unit-3-body">
                                    <p>Lo dejaste al último. Busca a que estudiantes les urge presentar ya sus proyectos modulares, únete a ellos para que así juntos comiencen con este gran reto académico.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="600">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <div class="unit-3-icon-wrap mr-4">
                                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                        </svg>
                                        <span class="unit-3-icon icon fa fa-bars"></span>
                                    </div>
                                    <h2 class="h5">Todas las áreas</h2>
                                </div>
                                <div class="unit-3-body">
                                    <p>Busca el área que mas te llame la atención y encuentra estudiantes que busquen tus mismos intereses. Estas áreas se basan en los Lineamientos que exigen los proyectos modulares</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>