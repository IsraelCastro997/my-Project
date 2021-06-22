<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }
    $students = file_get_contents('http://localhost/my-project/controllers/student.php?o=15');
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
                    <h2 class="mb-0">Red Universitaria <br/><?php echo $students; ?> estudiantes activos</h2>
                </div>
            </div>
            <center>
                <form action="../controllers/student.php" method="GET" class="p-5 bg-white">
                    <div class="form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span><i class="fa fa-search" aria-hidden="true"></i></span></span>
                                </div>
                                <input hidden="true" type="text" class="form-control" id="o" name="o" value="3">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Buscar alumnos (correo o código)" aria-label="Username" aria-describedby="basic-addon1" required="true" minlength="3" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info py-2 px-5 text-white">Buscar</button>
                        </div>
                    </div>
                </form>
            </center>
            <!--<div class="site-section bg-light">
                <div class="container">
                    <div class="row">
                        <?php 
                        echo file_get_contents("http://localhost/my-project/controllers/student.php?o=2");
                        ?>
                    </div>
                </div>
            </div>-->
            <?php include './html/footer.php'; ?>
    </body>
</html>