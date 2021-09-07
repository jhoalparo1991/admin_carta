<h1 class="text-center text-muted">Editar slide</h1>
<hr>
<a href="<?=URL?>/slide/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/slide/modificar" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre del articulo</label>
                        <input type="text" name="nombre" value="<?=Methods::printer($data["sliders"]["nombre"])?>" class="form-control" placeholder="Nombre articulo">
                        <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="2"><?=Methods::printer($data["sliders"]["descripcion"])?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Imagen</label>
                        <img src="<?=URL?>/public/img/uploads/<?=Methods::printer($data["sliders"]["imagen"])?>" alt="" width="80">
                        <input class="form-control" type="file" name="imagen" id="formFile">
                        <small class="text-danger"><?=Sessions::getSession("imagen_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Imagen principal</label>
                       
                        <select name="imagen_principal" id="imagen_principal" class="form-control">
                            <option value="" <?=($data["sliders"]["imagen_principal"] == '') ? "selected" : ""?>  >Secundaria</option>
                            <option value="active"
                            value="" <?=($data["sliders"]["imagen_principal"] == 'active') ? "selected" : ""?>
                            >Principal</option>
                        </select>
                        <small class="text-warning">* solo puede haber un slide PRINCIPAL</small>
                    </div>
                    <div class="form-group py-2">
                        <input type="hidden" name="id" value="<?=Methods::printer($data["sliders"]["id"])?>">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("imagen_vacio");
                    Sessions::deleteSession("nombre_vacio");
                ?>
            </div>
        </div>
    </div>
</div>