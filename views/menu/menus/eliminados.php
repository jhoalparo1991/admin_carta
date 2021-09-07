<h1 class="text-center text-muted">Eliminados</h1>
<hr>
<div class="btn-group">
    <a href="<?=URL?>/menu/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <a href="<?=URL?>/menu/eliminados" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminados</a>
</div>
<?php if(isset($data["menu"]) && $data["menu"] > 0 ) : ?>
<table class="table">
    <thead class="head-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data["menu"] as $value) : ?>
        <tr>
            <th><?=$value["id"] ?></th>
            <td><?=$value["nombre"] ?></td>
            <td>
                <?php if($value["estado"] == 1) : ?>
                    <span class="badge bg-success">Activo</span>
                <?php else:?>
                    <span class="badge bg-danger">Inactivo</span>
                <?php endif; ?>
            </td>
            <td>
                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
<?php else: ?>
<p class="h3 text-center text-muted">No tienes registros aunt</p>
<?php endif; ?>