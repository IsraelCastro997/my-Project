<?php 
    error_reporting(0);
    session_start();
    $id_project = $_GET['id'];
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    $request = file_get_contents('http://localhost/my-project/controllers/student.php?o=5&id='.$id_user);
    $description_project = file_get_contents('http://localhost/my-project/controllers/project.php?o=3&id='.$id_project);
    $owner = file_get_contents('http://localhost/my-project/controllers/project.php?o=18&id='.$id_project);
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
    $comments = file_get_contents('http://localhost/my-project/controllers/comment.php?o=3&id='.$id_project);
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
        <div class="unit-5 overlay" style="background-image: url('images/hero_bg_2.jpg');">
            <div class="container text-center">
                <h2 class="mb-0"><?php echo $namePostProject;?></h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                        <form action="../controllers/comment.php?o=7&user=<?php echo $id_user; ?>&project=<?php echo $id_project?>" method="POST" class="p-5 bg-white">
                                <div class="row form-group" hidden="true">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="id">Id de proyecto</label>
                                        <input type="text" id="id" name="id" class="form-control" value="<?php echo $id_project; ?>">
                                    </div>
                                </div>
                                <div class="row form-group" hidden="true">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="id">Id del interesado</label>
                                        <input type="text" id="student_interested" name="student_interested" class="form-control" value="<?php echo $id_user; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0 bg-light">
                                        <label class="font-weight-bold" for="description">Descripción de proyecto</label>
                                        <?php echo $description_project; ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        
                                    </div>
                                    <label class="font-weight-bold" for="career"><i class="fa fa-comments" aria-hidden="true" title="Notas"></i> <?php echo $comments; ?> <a href="./comentarios.php?id=<?php echo $id_project; ?>" target="_blank">Ir a los Comentarios</a></label>
                                </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Aplicar" class="btn btn-primary py-2 px-5">
                                    <a href="../controllers/comment.php?o=7&user=<?php echo $id_user; ?>&project=<?php echo $id_project; ?>" class="btn btn-danger rounded-circle btn-favorite active"><span class="fa fa-heart"></span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Más detalles</h3>
                            <label class="font-weight-bold" for="career"> Publicado el: <?php echo $createdAt; ?> </label>
                            <h3 class="h5 mb-3"><i class="fa fa-paperclip" aria-hidden="true"></i> <a href="./ver-documento.php?id=<?php echo $id_project; ?>" target="_blank"><?php echo $namePostProject.'.pdf'; ?></a><br></h3>
                            
                            <label class="font-weight-bold" for="career"><i class="fa fa-tags" aria-hidden="true" title="Etiquetas"></i> <?php echo $tags; ?> </label>
                            <label class="font-weight-bold" for="career"><i class="fa fa-map-marker" aria-hidden="true" title="División"></i> <?php echo $degree; ?> </label>
                            <label class="font-weight-bold" for="career"><i class="fa fa-signal" aria-hidden="true" title="Prioridad"></i> <?php echo $priority; ?> </label>
                            <label class="font-weight-bold" for="career"><i class="fa fa-calendar" aria-hidden="true" title="Horario"></i> <?php echo $schedule; ?> </label>
                            <label class="font-weight-bold" for="career"><i class="fa fa-certificate" aria-hidden="true" title="Experencia"></i> <?php echo $experience; ?> </label>
                            <label class="font-weight-bold" for="career"><i class="fa fa-university" aria-hidden="true" title="Area"></i> <?php echo $area; ?> </label>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Deja tus comentarios</h3>
                            <form action="../controllers/comment.php?o=4" method="POST" class="p-5 bg-white">
                                <div class="row form-group" hidden="true">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="id_project">ID Projecto</label>
                                        <input type="text" id="id_project" name="id_project" class="form-control" value="<?php echo $id_project; ?>" required="true">
                                    </div>
                                </div>
                                <div class="row form-group" hidden="true">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="student">ID estudiante</label>
                                        <input type="text" id="student" name="student" class="form-control" value="<?php echo $id_user; ?>" required="true">
                                    </div>
                                </div>
                                <div class="row form-group" hidden="true">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="id">Id del dueño </label>
                                        <input type="text" id="owner" name="owner" class="form-control" value="<?php echo $owner; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="name">Nombre</label>
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo '@'.$userName; ?>" required="true" readonly >
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="comments_project">Comentarios</label>
                                        <textarea class="form-control" name="comments_project" id="comments_project" cols="15" rows="5" required="true"></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" value="Publicar" class="btn btn-primary py-2 px-5">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>