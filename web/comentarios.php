<?php 
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }
    $id = $_GET['id'];
    $comments = file_get_contents('http://localhost/my-project/controllers/comment.php?o=3&id='.$id);
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
                    <div class="row justify-content-start text-left mb-5">
                        <div class="col-md-9" data-aos="fade">
                            <h2 class="font-weight-bold text-black">Comentarios (<?php echo $comments; ?>)</h2>
                        </div>
                    </div>

                    <?php echo file_get_contents("http://localhost/my-project/controllers/comment.php?o=2&id=".$id); ?>
                    
                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <li><a>...</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './html/footer.php'; ?>
    </body>
</html>