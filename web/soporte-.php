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
        <div class="unit-5 overlay" style="background-image: url('images/hero_bg_2.jpg');">
            <div class="container text-center">
                <h2 class="mb-0">Soporte</h2>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-5">
                            <form action="#" method="POST" class="p-5 bg-white">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="code">Código</label>
                                    <input type="number" id="code" name="code" class="form-control" placeholder="212576536" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">Nombre Completo</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="John" required="true">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Categoria</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="">Seleccione..</option>
                                        <option value="1">Inicio de sesión</option>
                                        <option value="2">Registro de proyecto</option>
                                        <option value="3">Aplicaciones</option>
                                        <option value="4">Favoritos</option>
                                        <option value="5">Estadisticas</option>
                                        <option value="6">Cuenta</option>
                                        <option value="7">Contraseña</option>
                                        <option value="8">Red Universitaria</option>
                                        <option value="9">Mis proyectos</option>
                                        <option value="10">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Accion</label>
                                    <select class="form-control" id="career" name="career" required="true">
                                        <option value="">Seleccione..</option>
                                        <option value="1">Nuevo</option>
                                        <option value="2">Detalles</option>
                                        <option value="3">Actualizar</option>
                                        <option value="4">Eliminar</option>
                                        <option value="5">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Problema</label>
                                    <textarea type="email" id="mail" name="mail" class="form-control" required="true"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Enviar" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>