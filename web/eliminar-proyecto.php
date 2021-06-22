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
                <h2 class="mb-0">Eliminar Proyecto</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                            <form action="../controllers/project.php?o=19" method="POST" class="p-5 bg-white">
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
                                    <label class="font-weight-bold" for="name"><?php echo $id_project ?></label>
                                    <!-- <input type="text" id="name" name="name" class="form-control" placeholder=<?php echo $namePostProject ?> required="true" value="<?php echo $nameStudent .' '.$paternalSurnameStudent.' '.$maternalSurnameStudent; ?>"> -->
                                    <input type="hidden" value="<?php echo $id_project ?>" name="id_project" id="id_project">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Motivo</label>
                                    <textarea type="email" id="mail" name="mail" class="form-control" required="true"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Eliminar" class="btn btn-danger  py-2 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Nos da tristeza que te vayas. Antes de irte, ¿En que podemos mejorar? </h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>