<h1 class="text-center text-muted">Editar ofertas</h1>
<hr>
<a href="<?=URL?>/ofertas/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/ofertas/modificar" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre del articulo</label>
                        <input type="text" name="nombre" class="form-control" value="<?=Methods::printer($data["ofertas"]["nombre"])?>" placeholder="Nombre articulo">
                        <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio del articulo</label>
                        <input type="number" step="1" min="1" max="999999999999"name="precio" class="form-control" 
                        value="<?=Methods::printer($data["ofertas"]["precio"])?>"
                        placeholder="precio articulo">
                        <small class="text-danger"><?=Sessions::getSession("precio_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="2"><?=Methods::printer($data["ofertas"]["descripcion"])?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Imagen</label>
                        <img src="<?=URL?>/public/img/uploads/<?=Methods::printer($data["ofertas"]["imagen"])?>" alt="" width="80">
                        <input class="form-control" type="file" name="imagen" id="formFile">
                        <small class="text-danger"><?=Sessions::getSession("imagen_vacio")?></small>
                    </div>
                    <div class="form-group">
                       <div class="row">
                           <div class="col-md-6 col-xs-12">
                               <label for="fecha_inicio">Fecha inicio</label>
                               <input type="date" name="fecha_inicio" 
                               value="<?=Methods::printer($data["ofertas"]["fecha_inicio"])?>"
                               id="" class="form-control" >
                           </div>
                           <div class="col-md-6 col-xs-12">
                           <label for="fecha_fin">Fecha fin</label>
                               <input type="date" name="fecha_fin" 
                               value="<?=Methods::printer($data["ofertas"]["fecha_fin"])?>"
                               id="" class="form-control">

                           </div>
                       </div>
                    </div>
                    <div class="form-group py-2">
                    <input type="hidden" name="id" value="<?=Methods::printer($data["ofertas"]["id"])?>">
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