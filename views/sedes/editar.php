<h1 class="text-center text-muted">Modificar sede</h1>
<hr>
<a href="<?=URL?>/sedes/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/sedes/modificar" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="comentario">Nombre de la sede</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Sede" value="<?=Methods::printer($data["sede"]["nombre"])?>">
                        <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                    </div>
                    <div class="form-group py-2">
                        <input type="hidden" name="id" value="<?=Methods::printer($data["sede"]["id"])?>" >
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("nombre_vacio");
                ?>
            </div>
        </div>
    </div>
</div>