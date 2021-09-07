<h1 class="text-center text-muted">Modificar producto</h1>
<hr>
<a href="<?=URL?>/productos/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">

                <form action="<?=URL?>/productos/modificar" method="post" autocomplete="off">
                    <?php $producto = $data['producto']; ?>
                    <div class="form-group">
                        <label for="nombre">Articulos</label>
                        <select class="form-select" aria-label="Default select example" name="articulo_id">
                            <?php foreach($data["articulos"] as $key => $value) : ?>
                            <option value="<?=$value["id"]?>"
                            <?=($producto["articulo_id"] == $value["id"]) ? "selected" : "" ?>
                            ><?=$value["nombre"]?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?=Sessions::getSession("articulo_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <label for="sede">Sede</label>
                        <select class="form-select" aria-label="Default select example" name="sede_id">
                            <?php foreach($data["sedes"] as $key => $value) : ?>
                            <option value="<?=$value["id"]?>"
                            <?=($producto["sede_id"] == $value["id"]) ? "selected" : "" ?>
                            ><?=$value["nombre"]?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?=Sessions::getSession("sede_vacio")?></small>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="precio_1">Precio 1</label>
                                <input type="number" name="precio_1" class="form-control"
                                    value="<?=Methods::printer($producto["precio_1"])?>" placeholder="$0.00">
                                <small class="text-danger"><?=Sessions::getSession("precio1_vacio")?></small>
                            </div>
                            <div class="col">
                            <label for="precio_2">Precio 2</label>
                                <input type="number" name="precio_2" class="form-control"
                                    value="<?=Methods::printer($producto["precio_2"])?>" placeholder="$0.00">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <input type="hidden" name="id" value="<?=Methods::printer($producto["id"])?>">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                        <small class="text-danger"><?=Sessions::getSession("id_vacio")?></small>
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