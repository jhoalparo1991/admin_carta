<h1 class="text-center text-muted">Listado de menus</h1>
<hr>
<div class="btn-group">
    <a href="<?= URL ?>/menu/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
</div>
<?php if (isset($data["menu"]) && $data["menu"] > 0) : ?>
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
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["nombre"] ?></td>
                    <td  width="120">
                        <?php if ($value["estado"] == 1) : ?>
                            <a href="<?= URL ?>/menu/update/&id=<?= $value["id"] ?>&status=0" class="nav-link badge bg-success">Activo</a>
                        <?php else : ?>
                            <a href="<?= URL ?>/menu/update&id=<?= $value["id"] ?>&status=1" class="nav-link badge bg-danger">Inactivo</a>
                        <?php endif; ?>
                    </td>
                    <td width="80">
                        <a href="<?= URL ?>/menu/editar/&id=<?= $value["id"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aunt</p>
<?php endif; ?>