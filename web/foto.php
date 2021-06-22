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
                <h2 class="mb-0">Edita tu foto</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                            <form action="../controllers/student.php?o=14" method="POST" class="p-5 bg-white" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0" hidden="true">
                                    <label class="font-weight-bold" for="id">ID</label>
                                    <input type="number" id="id" name="id" class="form-control" value="<?php echo $id_user; ?>" required="true">
                                </div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="photo">Foto</label>
                                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Actualizar" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-info text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE</h3>
                            <p>Una foto donde se va tu rostro es vital para que más estudiantes te ubiquen. Descuida estamos trabajando con la UdeG, para que solo con tu código NO tengas que llenar este apartado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './html/footer.php'; ?>
    </body>
</html>