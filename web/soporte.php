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
                <h2 class="mb-0">Soporte</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                            <form action="#" method="POST" class="p-5 bg-white">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0" hidden="true">
                                    <label class="font-weight-bold" for="id">ID</label>
                                    <input type="number" id="id" name="id" class="form-control" value="<?php echo $id_user; ?>" required="true">
                                </div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="code">Código</label>
                                    <input type="number" id="code" name="code" class="form-control" placeholder="212576536" required="true" value="<?php echo $codeStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">Nombre Completo</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="John" required="true" value="<?php echo $nameStudent .' '.$paternalSurnameStudent.' '.$maternalSurnameStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Categoria</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="">Seleccione..</option>
                                        <option value="1">Inicio de sesión</option>
                                        <option value="2">Registro de proyecto</option>
                                        <option value="3">Aplicaciones</option>
                                        <option value="4">Favoritos</option>
                                        <option value="5">Estadisticas</option>
                                        <option value="6">Cuenta</option>
                                        <option value="7">Contraseña</option>
                                        <option value="8">Red Universitaria</option>
                                        <option value="9">Mis proyectos</option>
                                        <option value="10">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Accion</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="">Seleccione..</option>
                                        <option value="1">Nuevo</option>
                                        <option value="2">Detalles</option>
                                        <option value="3">Actualizar</option>
                                        <option value="4">Eliminar</option>
                                        <option value="5">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Problema</label>
                                    <textarea type="email" id="mail" name="mail" class="form-control" required="true"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Enviar" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Prueba nuestros canales de Soporte Técnico</h3>
                            &nbsp;&nbsp;
                            <a href="./celular.php" target="_blank">
                            <i class="fa fa-phone" aria-hidden="true" title="Celular"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="./correo.php" target="_blank">
                            <i class="fa fa-envelope" aria-hidden="true" title="Correo"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="./chat.php" target="_blank">
                            <i class="fa fa-users" aria-hidden="true" title="Chat"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="./tickets.php" target="_blank">
                            <i class="fa fa-ticket" aria-hidden="true" title="Help Desk"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>