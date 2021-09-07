<h1 class="text-center text-muted">Crear producto</h1>
<hr>
<a href="<?=URL?>/productos/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">

                <form action="<?=URL?>/productos/insertar" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Articulos</label>
                        <select class="form-select" aria-label="Default select example" name="articulo_id">
                            <?php foreach($data["articulos"] as $key => $value) : ?>
                            <option value="<?=$value["id"]?>"><?=$value["nombre"]?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?=Sessions::getSession("articulo_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="sede">Sede</label>
                        <select class="form-select" aria-label="Default select example" name="sede_id">
                            <?php foreach($data["sedes"] as $key => $value) : ?>
                            <option value="<?=$value["id"]?>"><?=$value["nombre"]?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?=Sessions::getSession("sede_vacio")?></small>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="precio_1">Precio 1</label>
                                <input type="number" name="precio_1" class="form-control" placeholder="$0.00">
                               
                            </div>
                            <div class="col">
                            <label for="precio_2">Precio 2</label>
                                <input type="number" name="precio_2" class="form-control" placeholder="$0.00">
                            </div>
                        </div>
                        <small class="text-danger"><?=Sessions::getSession("precio1_vacio")?></small>
                        <small class="text-danger"><?=Sessions::getSession("precio2_vacio")?></small>
                    </div>
                    <div class="form-group py-2">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("articulo_vacio");
                    Sessions::deleteSession("sede_vacio");
                    Sessions::deleteSession("precio1_vacio");
                ?>
            </div>
        </div>
    </div>
</div>