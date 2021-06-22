<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    $idCareer = file_get_contents('http://localhost/my-project/controllers/student.php?o=13&id='.$id_user);
    $id_project = $_GET['id'];
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }
    $request = file_get_contents('http://localhost/my-project/controllers/student.php?o=5&id='.$id_user);
    $description_project = file_get_contents('http://localhost/my-project/controllers/project.php?o=3&id='.$id_project);
    $namePostProject = file_get_contents('http://localhost/my-project/controllers/project.php?o=4&id='.$id_project);
    $tags = file_get_contents('http://localhost/my-project/controllers/project.php?o=5&id='.$id_project);
    $career = file_get_contents('http://localhost/my-project/controllers/project.php?o=6&id='.$id_project);
    $degree = file_get_contents('http://localhost/my-project/controllers/project.php?o=7&id='.$id_project);
    $priority = file_get_contents('http://localhost/my-project/controllers/project.php?o=8&id='.$id_project);
    $schedule = file_get_contents('http://localhost/my-project/controllers/project.php?o=9&id='.$id_project);
    $experience = file_get_contents('http://localhost/my-project/controllers/project.php?o=10&id='.$id_project);
    $area = file_get_contents('http://localhost/my-project/controllers/project.php?o=11&id='.$id_project);
    $notes = file_get_contents('http://localhost/my-project/controllers/project.php?o=12&id='.$id_project);
    $createdAt = file_get_contents('http://localhost/my-project/controllers/project.php?o=13&id='.$id_project);
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
                <h2 class="mb-0">Edita tu proyecto</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-5">
                        <div class="p-4 mb-3 bg-danger text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE <i class="fa fa-user-md fa-2x" aria-hidden="true"></i></h3>
                            <p>El SARS-Cov-2 es muy contagioso, por lo que recomendamos realizar tus juntas o reuniones a través de las siguientes aplicaciones de videoconferencia: Zoom, Google Meet y Teams, así evitamos los contagios.</p>
                        </div>
                        <div class="p-4 mb-3 bg-info text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE</h3>
                            <p></p>
                        </div>
                            <form action="#" method="POST" class="p-5 bg-white">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0" hidden="true">
                                        <label class="font-weight-bold" for="student">Estudiante</label>
                                        <input type="number" id="student" name="student" class="form-control" placeholder="212576536" required="true" value="<?php echo $id_user; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="namePostProject">Nombre de proyecto</label>
                                        <input type="text" id="namePostProject" name="namePostProject" class="form-control" placeholder="my-project" value="<?php echo $namePostProject; ?>" required="true">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="description">Descripción de proyecto</label>
                                        <textarea class="form-control" name="description" id="description" required="true" cols="30" rows="5"><?php echo $description_project; ?></textarea>
                                    </div>
                                    <script>
                                      $('#description').summernote({
                                        tabsize: 1,
                                        height: 100
                                      });
                                  </script>
                                </div>
                                <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Carrera</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="<?php echo $idCareer; ?>"><?php echo $career; ?></option>
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
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="tags">Etiquetas</label>
                                        <input type="text" id="tags" name="tags" class="form-control" placeholder="my-project, inni" required="true" value="<?php echo $tags; ?>">
                                        <label class="font-weight-bold" for="">Separa por comas , </label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="degree">División</label>
                                        <select class="form-control" id="degree" name="degree" required="true">
                                            <option value="">Seleccione..</option>
                                            <option value="ciencias_basicas">Ciencias Basicas</option>
                                            <option value="ingenierias">Ingenierias</option>
                                            <option value="electronica_computacion">Electronica y computación</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="priority">Prioridad</label>
                                        <select class="form-control" id="priority" name="priority" required="true">
                                            <option value="">Seleccione..</option>
                                            <option value="bajo">Baja</option>
                                            <option value="normal">Normal</option>
                                            <option value="alto">Alto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="schedule">Horario para proyecto</label>
                                        <select class="form-control" id="schedule" name="schedule" required="true">
                                            <option value="">Seleccione..</option>
                                            <option value="matunino">Matunino</option>
                                            <option value="vespertino">Vespertino</option>
                                            <option value="semana_estudiantil">Semana estudiantil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for=""experience>Experencia requerida</label>
                                        <select class="form-control" id="experience" name="experience" required="true">
                                            <option value="ninguna">Seleccione..</option>
                                            <option value="ninguna">Ninguna</option>
                                            <option value="junior">Junior</option>
                                            <option value="senior">Senior</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="area">Area</label>
                                        <select class="form-control" id="area" name="area" required="true">
                                            <option value="ninguna">Seleccione..</option>
                                            <option value="ambiente">Ambiente</option>
                                            <option value="conocimiento_del_universo">Conocimiento del Universo</option>
                                            <option value="educacion">Educación</option>
                                            <option value="desarrollo_sustentable">Desarrollo Sustentable</option>
                                            <option value="desarrollo_tecnologico">Desarrollo Tecnologico</option>
                                            <option value="energia">Energia</option>
                                            <option value="salud">Salud</option>
                                            <option value="sociedad">Sociedad</option>
                                        </select>
                                    </div>
                                </div><hr>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="notes">Notas</label>
                                        <textarea class="form-control" name="notes" id="notes" cols="30" rows="5"><?php echo $notes; ?></textarea>
                                    </div>
                                </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Actualizar" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 mb-3">Documento</h3>
                            <p><a href="./documento.php?id=<?php echo $id_project; ?>">Editar documento</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>