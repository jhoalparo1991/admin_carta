<h1 class="text-center text-muted">Modificar categoria</h1>
<hr>
<a href="<?=URL?>/categorias/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <?php $categoria = $data["categoria"]; 
                //echo $categoria["menu_id"];
                ?>
                <form action="<?=URL?>/articulos/modificar" method="post" autocomplete="off">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <label for="nombre">Menú</label>
                                <select class="form-select" aria-label="Default select example" name="menu_id">
                                    <?php foreach($data["menus"] as $key => $value) : ?>
                                <option value="<?=$value["id"]?>" <?=($categoria["menu_id"] == $value["id"]) ? 'selected' : '' ?>  ><?=$value["nombre"]?></option>
                                  <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?=Sessions::getSession("menu_id_vacio")?></small>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <label for="nombre">Categoria</label>
                                <input type="text" name="nombre" value="<?=isset($categoria["nombre"]) ? $categoria["nombre"] : '' ?>" class="form-control" placeholder="Nombre categoria">
                                <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="2" ><?=isset($categoria["descripcion"]) ? $categoria["descripcion"] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario</label>
                        <textarea name="comentario" id="comentario" class="form-control" rows="2"><?=isset($categoria["comentario"]) ? $categoria["comentario"] : '' ?></textarea>
                    </div>
                    <div class="form-group py-2">
                        <input type="hidden" name="id" value="<?=isset($categoria["id"]) ? $categoria["id"] : '' ?>" >
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