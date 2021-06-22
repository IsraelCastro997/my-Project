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
                <h2 class="mb-0">Edita tus datos</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                        <div class="p-4 mb-3 bg-danger text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE <i class="fa fa-user-md fa-2x" aria-hidden="true"></i></h3>
                            <p>El SARS-Cov-2 es muy contagioso, por lo que recomendamos realizar tus juntas o reuniones a través de las siguientes aplicaciones de videoconferencia: Zoom, Google Meet o Teams, así evitamos los contagios.</p>
                        </div>
                        <?php
                            if($request == 200){
                        ?>
                            <form action="../controllers/student.php?o=6" method="POST" class="p-5 bg-white">
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
                                    <label class="font-weight-bold" for="name">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="John" required="true" value="<?php echo $nameStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="paternalSurname">Apellido Paterno</label>
                                    <input type="text" id="paternalSurname" name="paternalSurname" class="form-control" placeholder="Doe" required="true" value="<?php echo $paternalSurnameStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Apellido Materno</label>
                                    <input type="text" id="maternalSurname" name="maternalSurname" class="form-control" placeholder="Mark" required="true" value="<?php echo $maternalSurnameStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Correo</label>
                                    <input type="email" id="mail" name="mail" class="form-control" placeholder="jdoe@alumnos.udg.mx" required="true" value="<?php echo $emailStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Celular</label>
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="3333333333" required="true" value="<?php echo $phoneStudent; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Carrera</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="<?php echo $idCareer; ?>">Seleccione..</option>
                                        <option value="9">BIM | LIC EN ING. BIOMEDICA</option>
                                        <option value="7">CEL | LIC EN ING. EN COM.Y ELEC.</option>
                                        <option value="6">CIV | LIC EN ING. CIVIL</option>
                                        <option value="13">COM | LIC EN ING. EN COMPUTACION</option>
                                        <option value="10">FIS | LIC EN FISICA</option>
                                        <option value="16">INAB | LIC EN ING. EN ALIMENTOS Y BI</option>
                                        <option value="23">INBI | ING BIOMEDICA</option>
                                        <option value="22">INCE | ING EN COMUNICACIONES Y ELECTR</option>
                                        <option value="24">INCO | ING EN COMPUTACION</option>
                                        <option value="4">IND | LIC ING. INDUSTRIAL</option>
                                        <option value="27">INDU | ING INDUSTRIAL</option>
                                        <option value="11">INF | LIC EN INFORMATICA</option>
                                        <option value="14">INFC | LIC EN INFORMATICA SIST COMPU</option>
                                        <option value="15">INFI | LIC EN INFORMATICA SIST INFOR</option>
                                        <option value="25">INME | ING MECANICA ELECTRICA</option>
                                        <option value="26">INNI | ING INFORMATICA</option>
                                        <option value="20">INQU | ING QUIMICA</option>
                                        <option value="8">IQU | LIC EN ING. QUIMICA</option>
                                        <option value="28">LIFI | LIC EN FISICA</option>
                                        <option value="18">LIMA | LIC EN MATEMATICAS</option>
                                        <option value="17">LINA | LIC EN ING EN ALIMENTOS Y BIOT</option>
                                        <option value="19">LQFB | LIC EN QUIMICO FARMACE BIOLOGO</option>
                                        <option value="21">LQUI | LIC EN QUIMICA</option>
                                        <option value="12">MAT | LIC EN MATEMATICAS</option>
                                        <option value="2">MEL | LIC EN ING. MECANICA ELECTRICA</option>
                                        <option value="3">QFB | LIC EN QUIM.FARMACOBIOLOGO</option>
                                        <option value="5">QUI | LIC EN QUIMICA</option>
                                        <option value="1">TOP | LIC ING. TOPOGRAFICA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Actualizar" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                        </form>
                        <?php
                            }else{//if
                        ?>
                        <form action="#" class="p-5 bg-white">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0" hidden="true">
                                    <label class="font-weight-bold" for="id">ID</label>
                                    <input type="number" id="id" name="id" class="form-control" value="<?php echo $id_user; ?>" required="true">
                                </div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="code">Código</label>
                                    <input type="number" id="code" name="code" class="form-control" placeholder="212576536" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="John" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="paternalSurname">Apellido Paterno</label>
                                    <input type="text" id="paternalSurname" name="paternalSurname" class="form-control" placeholder="Doe" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Apellido Materno</label>
                                    <input type="text" id="maternalSurname" name="maternalSurname" class="form-control" placeholder="Mark" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Correo</label>
                                    <input type="email" id="mail" name="mail" class="form-control" placeholder="jdoe@alumnos.udg.mx" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Celular</label>
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="3333333333" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Carrera</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="">Seleccione..</option>
                                        <option value="9">BIM | LIC EN ING. BIOMEDICA</option>
                                        <option value="7">CEL | LIC EN ING. EN COM.Y ELEC.</option>
                                        <option value="6">CIV | LIC EN ING. CIVIL</option>
                                        <option value="13">COM | LIC EN ING. EN COMPUTACION</option>
                                        <option value="10">FIS | LIC EN FISICA</option>
                                        <option value="16">INAB | LIC EN ING. EN ALIMENTOS Y BI</option>
                                        <option value="23">INBI | ING BIOMEDICA</option>
                                        <option value="22">INCE | ING EN COMUNICACIONES Y ELECTR</option>
                                        <option value="24">INCO | ING EN COMPUTACION</option>
                                        <option value="4">IND | LIC ING. INDUSTRIAL</option>
                                        <option value="27">INDU | ING INDUSTRIAL</option>
                                        <option value="11">INF | LIC EN INFORMATICA</option>
                                        <option value="14">INFC | LIC EN INFORMATICA SIST COMPU</option>
                                        <option value="15">INFI | LIC EN INFORMATICA SIST INFOR</option>
                                        <option value="25">INME | ING MECANICA ELECTRICA</option>
                                        <option value="26">INNI | ING INFORMATICA</option>
                                        <option value="20">INQU | ING QUIMICA</option>
                                        <option value="8">IQU | LIC EN ING. QUIMICA</option>
                                        <option value="28">LIFI | LIC EN FISICA</option>
                                        <option value="18">LIMA | LIC EN MATEMATICAS</option>
                                        <option value="17">LINA | LIC EN ING EN ALIMENTOS Y BIOT</option>
                                        <option value="19">LQFB | LIC EN QUIMICO FARMACE BIOLOGO</option>
                                        <option value="21">LQUI | LIC EN QUIMICA</option>
                                        <option value="12">MAT | LIC EN MATEMATICAS</option>
                                        <option value="2">MEL | LIC EN ING. MECANICA ELECTRICA</option>
                                        <option value="3">QFB | LIC EN QUIM.FARMACOBIOLOGO</option>
                                        <option value="5">QUI | LIC EN QUIMICA</option>
                                        <option value="1">TOP | LIC ING. TOPOGRAFICA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Registarme" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                        </form>
                        <?php
                            }//else
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-info text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE</h3>
                            <p>Mantén tu perfil completo y actualizado, si lo mantienes así, mas estudiantes te pueden contactar para unirte a sus equipos.</p>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Más detalles</h3>
                            <a href="./eliminar-cuenta.php">
                            <i class="fa fa fa-trash" aria-hidden="true" title="Eliminar"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="./soporte.php" target="_blank">
                            <i class="fa fa-life-ring" aria-hidden="true" title="Soporte Personal"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="./soporte.php" target="_blank">
                            <i class="fa fa-lock" aria-hidden="true"  title="Cambiar contraseña"></i>
                            </a>
                            &nbsp;&nbsp;
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Foto</h3>
                            <p class="mb-0 font-weight-bold">
                                <a href="./foto.php">Editar foto</a>
                            </p>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Token</h3>
                            <p class="mb-0 font-weight-bold">
                                <?php echo $token; ?>
                            </p>
                            <p>
                                <a href="./info-token.php" class="btn btn-primary  py-2 px-4">¿Para que sirve?</a>
                            </p>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Info</h3>
                            <p>Tienes más preguntas sobre los modulares.</p>
                            <p>
                                <a href="./faq.php" class="btn btn-primary  py-2 px-4">Ir</a>
                            </p>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Enlaces rápidos a cucei o UDG</h3>
                            <a href="http://www.cucei.udg.mx/" target="_blank">
                            <i class="fa fa-circle" aria-hidden="true" title="CUCEI"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://es-la.facebook.com/udgcucei/" target="_blank">
                            <i class="fa fa-facebook-square" aria-hidden="true" title="Facebook"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://twitter.com/udgcucei?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                            <i class="fa fa-twitter-square" aria-hidden="true" title="Twitter"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://www.instagram.com/udgcucei/?hl=es-la" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://www.youtube.com/user/videoscucei" target="_blank">
                            <i class="fa fa-youtube-play" aria-hidden="true" title="Youtube"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="http://www.siiau.udg.mx/" target="_blank">
                            <i class="fa fa-circle-o" aria-hidden="true" title="SIIAU"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="http://siiauescolar.siiau.udg.mx/wus/gupprincipal.inicio" target="_blank">
                            <i class="fa fa-graduation-cap" aria-hidden="true" title="SIIAU ESCOLAR"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>