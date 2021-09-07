<h1 class="text-center text-muted">Nuevo usuario</h1>
<hr>
<a href="<?=URL?>/usuarios/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
<div class="row">
    <div class="col-md-6 col-xs-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="<?=URL?>/usuarios/guardar" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="nombre">Sucursal</label>
                                <select class="form-select" aria-label="Default select example" name="sede_id" required>
                                    <?php foreach($data["sedes"] as $key => $value) : ?>
                                    <option value="<?=$value["id"]?>"><?=$value["nombre"]?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?=Sessions::getSession("sede_vacio")?></small>
                            </div>
                            <div class="col">
                                <label for="nombre">Rol</label>
                                <select class="form-select" aria-label="Default select example" name="rol" required>
                                    <option value="vendedor">Vendedor</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                                <small class="text-danger"><?=Sessions::getSession("rol_vacio")?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="nombres">Nombres</label>
                                <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                                <small class="text-danger"><?=Sessions::getSession("nombre_vacio")?></small>
                            </div>
                            <div class="col">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" placeholder="apellidos">
                                <small class="text-danger"><?=Sessions::getSession("apellido_vacio")?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" step="1" min="1" class="form-control" placeholder="correo" required>
                        <small class="text-danger"><?=Sessions::getSession("correo_vacio")?></small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="documento">Documento</label>
                                <input type="number" name="documento" step="1" min="1" class="form-control"
                                    placeholder="Documento" required>
                                <small class="text-danger"><?=Sessions::getSession("documento_vacio")?></small>
                            </div>
                            <div class="col">
                                <label for="clave">Clave</label>
                                <input type="password" name="clave" step="1" min="1" class="form-control"
                                    placeholder="clave" required>
                                <small class="text-danger"><?=Sessions::getSession("clave_vacio")?></small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="formFile" class="form-label">Imagen</label>
                        <input class="form-control" type="file" name="foto" id="formFile">
                    </div>
                    <div class="form-group py-2">
                        <input type="submit" value="Guardar" class="btn btn-success button">
                    </div>
                </form>
                <?php 
                    Sessions::deleteSession("sede_vacio");
                    Sessions::deleteSession("nombres_vacio");
                    Sessions::deleteSession("clave_vacio");
                    Sessions::deleteSession("documento_vacio");
                    Sessions::deleteSession("correo_vacio");
                    Sessions::deleteSession("rol_vacio");
                ?>
            </div>
        </div>
    </div>
</div>