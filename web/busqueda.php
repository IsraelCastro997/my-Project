<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    $search = $_GET['search'];
    $num = $_GET['num'];
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
                    <h2 class="mb-0">Resultados de la busqueda : <br>'<?php echo $search; ?>'</h2>
                </div>
            </div>
            <div class="site-section bg-light">
                <div class="container">
                    <div class="row">
                        <?php 
                        echo file_get_contents("http://localhost/my-project/controllers/student.php?o=4&search=".$search);
                        ?>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>