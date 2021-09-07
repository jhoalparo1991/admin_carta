<h1 class="text-center text-muted">Nueva categoria</h1>
<hr>
<a href="<?=URL?>/categorias/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/categorias/guardar" method="post" autocomplete="off">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <label for="nombre">Menú</label>
                                <select class="form-select" aria-label="Default select example" name="menu_id">
                                    <?php foreach($data as $key => $value) : ?>
                                <option value="<?=$value["id"]?>"><?=$value["nombre"]?></option>
                                  <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?=Sessions::getSession("menu_id_vacio")?></small>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <label for="nombre">Categoria</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre categoria">
                                <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario</label>
                        <textarea name="comentario" id="comentario" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group py-2">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("menu_id_vacio");
                    Sessions::deleteSession("nombre_vacio");
                ?>
            </div>
        </div>
    </div>
</div>