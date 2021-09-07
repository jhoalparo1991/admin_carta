<h1 class="text-center text-muted">Editar menu</h1>
<hr>
<a href="<?=URL?>/menu/listados" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
<div class="row">
    <div class="col-md-4 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <?php if(isset($data["menu"]) && $data["menu"] > 0) : ?>
                <form action="<?=URL?>/menu/modificar" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Nombre menu</label>
                        <input type="text" value="<?=isset($data["menu"]["nombre"]) ? $data["menu"]["nombre"] : '' ?>" name="nombre" class="form-control" placeholder="Nombre menu">
                        <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                    </div>
                    <div class="form-group py-2">
                        <input type="hidden" name="id" value="<?=isset($data["menu"]["id"]) ? $data["menu"]["id"] : '' ?>" >
                        <input type="submit" value="Guardar" class="btn btn-success button">
                        <small class="text-danger"><?=Sessions::getSession("id_vacio")?></small>
                    </div>
                </form>
                <?php endif; ?>
                <?php 
                    Sessions::deleteSession("nombre_vacio");
                    Sessions::deleteSession("id_vacio");
                ?>
            </div>
        </div>
    </div>
</div>