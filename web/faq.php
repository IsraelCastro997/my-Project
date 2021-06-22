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
    ?>
<!DOCTYPE html>
<html lang="en">
    <?php include './html/head.php'; ?>    <body>
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
                    <h2 class="mb-0">FAQ</h2>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-md-6" data-aos="fade">
                            <h2>Frequently Ask Questions</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                        <div class="col-md-8">
                            <div class="accordion unit-8" id="accordion">
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_1" role="button" aria-expanded="true" aria-controls="collapse_1"> ¿Qué son los proyectos modulares?<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_2" role="button" aria-expanded="false" aria-controls="collapse_2">Objetivos de los proyectos modulares<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>Los Proyectos Modulares tienen como objetivo potenciar el interés de los alumnos
                                                por las áreas de ingeniería que se imparten en la División de Electrónica y
                                                Computación: Ingeniería en Comunicaciones y Electrónica, Ingeniería en
                                                Computación, Ingeniería Informática, Ingeniería Biomédica, Ingeniería Fotónica e
                                                Ingeniería Robótica. Además de las colaboraciones que se den con las otras
                                                Divisiones del Centro o Instituciones externas a nuestro Centro.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_3" role="button" aria-expanded="false" aria-controls="collapse_3">Bases<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>1. Objetivos
                                                Los Proyectos Modulares están orientados a fomentar la creatividad de los alumnos con la
                                                aportación a soluciones de problemas reales y aumentar el interés por los estudios de
                                                ingeniería.<br>
                                                2. De los Participantes
                                                <b>a) Los grupos de participantes tendrán un máximo de 3 integrantes. Cada alumno sólo
                                                puede participar en un grupo.
                                                b) Podrán participar estudiantes de los niveles respectivos de licenciatura que no se
                                                encuentren en situación de artículos 33, 34 y 35.</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_4" role="button" aria-expanded="false" aria-controls="collapse_4">Proyectos<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_4" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>
                                                Con el propósito de fomentar la innovación tecnológica dentro de las carreras de Ingeniería
                                                en Comunicaciones y Electrónica, Ingeniería en Computación, Ingeniería Informática,
                                                Ingeniería Biomédica, Ingeniería Fotónica e Ingeniería Robótica, los proyectos se dividirán
                                                en categorías de acuerdo a las diferentes áreas de participación.
                                            </p>
                                                <table class="tg">
                                                <thead>
                                                  <tr>
                                                    <th class="tg-0lax">Áreas</th>
                                                    <th class="tg-0lax">Retos</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="tg-0lax"></td>
                                                    <td class="tg-0lax"></td>
                                                  </tr>
                                                </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>