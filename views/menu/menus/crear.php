<h1 class="text-center text-muted">Crear nuevo menu</h1>
<hr>
<a href="<?=URL?>/menu/listados" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
<div class="row">
    <div class="col-md-4 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/menu/guardar" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Nombre menu</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre menu">
                        <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                    </div>
                    <div class="form-group py-2">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("estado_vacio");
                    Sessions::deleteSession("nombre_vacio");
                ?>
            </div>
        </div>
    </div>
</div>