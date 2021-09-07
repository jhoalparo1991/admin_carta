<?php 
if(isset($_SESSION["login"])){ Redirect::to("menu/index");}
?>
<div class="container pt-4">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 mx-auto">
            <div class="text-muted">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title cardTile">Login</div>
                    </div>
                    <div class="card-body">
                        <form action="<?=URL?>/usuarios/login" method="post" autocomplete="off" >
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Ingrese su correo"
                                class="form-control input" autocomplete="off" autofocus>
                                <small class="text-danger"><?=Sessions::getSession("email_vacio")?></small>
                            </div>
                            <div class="form-group">
                            <label for="password">Clave</label>
                            <input type="password" name="password" id="password" placeholder="Ingrese su password"
                                class="form-control input" autocomplete="off">
                            </div>
                            <small class="text-danger"><?=Sessions::getSession("password_vacio")?></small>
                            <div class="form-group pt-4 text-center">
                                <input type="submit" value="Ingresar" class="btn btn-success button">
                            </div>
                            <small class="text-danger"><?=Sessions::getSession("user_not_found")?></small>
                        </form>
                        <?php 
                            Sessions::deleteSession("email_vacio");
                            Sessions::deleteSession("password_vacio");
                            Sessions::deleteSession("user_not_found");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>