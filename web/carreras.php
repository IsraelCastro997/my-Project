<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    $search = $_GET['search'];
    $id = $_GET['id'];
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
            <div class="site-section bg-light">
                <div class="container">
                    <div class="row">
                        <?php 
                        echo file_get_contents("http://localhost/my-project/controllers/career.php?o=2&id=".$id);
                        ?>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>