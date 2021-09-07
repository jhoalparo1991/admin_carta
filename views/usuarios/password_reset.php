<?php $usuario = $data['usuario']; ?>
    <?php if(isset($usuario) && !empty($usuario)) : ?>
<h1 class="text-center text-muted">Cambiar clave</h1>
<hr>
<div class="row">
   
    <div class="col-md-4 col-xs-12 mx-auto text-center">
        <p class="h2 text-muted text-center">
            <?=ucwords(Methods::printer($usuario["nombres"])) . ' '. ucwords(Methods::printer($usuario["apellidos"]))?>
        </p>
        <p class="text-muted text-center">Email : <?=Methods::printer($usuario["correo"])?></p>
        <p class="text-muted text-center">Documento : <?=Methods::printer($usuario["documento"])?></p>
        <p class="text-muted text-center">Rol : <?=Methods::printer($usuario["rol"])?></p>
        <form action="<?=URL?>/usuarios/change_password&<?=Methods::printer($usuario["id"])?>" method="post"
            autocomplete="off">
            <div class="form-group">
                <label for="password">Clave</label>
                <input type="password" name="password" class="form-control" placeholder="Clave">
                <small class="text-danger"><?=Sessions::getSession("clave_vacio")?></small>
            </div>
            <div class="form-group">
                <label for="password_repite">Repetir clave</label>
                <input type="password" name="password_repite" class="form-control" placeholder="Repetir clave">
                <small class="text-danger"><?=Sessions::getSession("password_repite_vacio")?></small>
            </div>
            <div class="form-group py-2">
                <input type="hidden" name="id" value="<?=Methods::printer($usuario["id"])?>">
                <input type="submit" value="Cambiar clave" class="btn btn-success button">
            </div>
        </form>
        <small class="text-danger"><?=Sessions::getSession("coincidencia")?></small>
        <?php 
         Sessions::deleteSession("clave_vacio");
         Sessions::deleteSession("password_repite_vacio");
         Sessions::deleteSession("coincidencia");
       ?>
    </div>
</div>
<?php else: 
    Redirect::to("usuarios/index");
    Sessions::createSession("error_password","No se pudo hacer el cambio en la clave valide los datos");
    ?>
<?php endif; ?>