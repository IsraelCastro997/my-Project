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
                        <form method="POST" action="../controllers/user.php?o=1" class="p-5 bg-white">
                            <center><img src="./images/brand.png" class="img-fluid"></center>
                            <h1>Registro</h1>
                        	<div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                	<div class="input-group mb-3">
									  <div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><span><i class="fa fa-user" aria-hidden="true"></i></span></span>
									  </div>
									  <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" required="true">
									</div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                	<div class="input-group mb-3">
									  <div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><span><i class="fa fa-lock" aria-hidden="true"></i></span></span>
									  </div>
									  <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" required="true">
									</div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success py-2 px-5">Registrarme <i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <a href="./login.php" class="btn btn-primary py-2 px-5">Iniciar sesión <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="row form-group">
                            </div>
                            
                        </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>
</html>