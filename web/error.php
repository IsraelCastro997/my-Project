<?php
    $error = $_GET['message'];
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
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-5">
                        <form action="#" class="p-5 bg-white">
                        	<h1 class="text-danger">
                                <?php 

                                    echo strtoupper($error);
                                ?><br>
                            </h1>
                            <p onclick="myFunction()"> <i class="fa fa-angle-left" aria-hidden="true"></i> Regresar</p>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function myFunction() {
              window.history.back();
            }
        </script>
    </body>

</html>