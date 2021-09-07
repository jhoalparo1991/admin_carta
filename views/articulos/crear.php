<h1 class="text-center text-muted">Nuevo articulo</h1>
<hr>
<a href="<?=URL?>/categorias/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/articulos/guardar" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Articulo</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre articulo">
                        <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Categorias</label>
                        <select class="form-select" aria-label="Default select example" name="categoria_id">
                            <?php foreach($data["categorias"] as $key => $value) : ?>
                            <option value="<?=$value["id"]?>"><?=$value["nombre"]?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?=Sessions::getSession("categoria_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Imagen</label>
                        <input class="form-control" type="file" name="imagen" id="formFile">
                    </div>
                    <div class="form-group py-2">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("categoria_vacio");
                    Sessions::deleteSession("nombre_vacio");
                ?>
            </div>
        </div>
    </div>
</div>