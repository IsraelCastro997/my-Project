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
                    <h2 class="mb-0">API</h2>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-md-6" data-aos="fade">
                            <h2>Token</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                        <div class="col-md-8">
                            <div class="accordion unit-8" id="accordion">
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_1" role="button" aria-expanded="true" aria-controls="collapse_1"> ¿Qué es un token?<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>Un ‘token‘ (en inglés, ficha, como por ejemplo las que se utilizan en las máquinas recreativas o los coches de coche) en realidad no es otra cosa que un nuevo término para una unidad de valor emitida por una entidad privada. Un ‘token’ tiene semejanzas con ‘bitcoin’ (tiene un valor aceptado por una comunidad y se fundamenta en blockchain), pero a la vez es un concepto más amplio.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_2" role="button" aria-expanded="false" aria-controls="collapse_2">¿Para que sirve un token aquí?<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>Nos ayuda para el dar el acceso a la información de cuenta, con el token podemos tener una forma más fácil de autentificar a los usuarios sin necesidad de pedir usuario y contraseñas, aun así nuestro servidor valida que token venga con un hash valido, si este hash no es válido no permitimos el acceso a la cuenta.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_3" role="button" aria-expanded="false" aria-controls="collapse_3">¿Como se estructura el token? <span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>Nuestro token se genera aleatoriamente en el sistema, se toma parte de nombre de usuario y parte de la fecha en la que se creo, con el se genera un hash único para cada usuario, sin embargo, no sabemos la longitud exacta del token ya que es generada de manera aleatoria.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_4" role="button" aria-expanded="false" aria-controls="collapse_4">¿Puedo cambiar el token?<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_4" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>
                                                No, el token es único y no se puede cambiar, ya que se tendría que cambiar por completo el sistema de autentificación, este sistema no se encuentra en los servidores de CUCEI, se encuentra en otro web service. Los desarrolladores tampoco pueden asignar token, el sistema los asigna y genera de manera automática.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="mb-0 heading">
                                        <a class="btn-block" data-toggle="collapse" href="#collapse_5" role="button" aria-expanded="false" aria-controls="collapse_4">Si llegan a hackear la base de datos, ¿la autenticación también es afectada?<span class="icon"></span></a>
                                    </h3>
                                    <div id="collapse_5" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="body-text">
                                            <p>
                                                El sistema de autentificación guarda una copia de todos los tokens generados, aunque se llegara a hackear, que es imposible, cuando tu inicias sesión, este compara el token con la el existente, después se compara con la copia, si un dato no es correcto el ingreso se prohíbe.
                                            </p>
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