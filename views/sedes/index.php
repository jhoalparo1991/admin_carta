<h1 class="text-center text-muted">Listado de sedes</h1>
<hr>
<div class="btn-group py-2">
    <a href="<?= URL ?>/sedes/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
</div>

<?php if (isset($data) && !empty($data)) : ?>
    <table class="table py-4">
        <thead class="head-dark">
            <tr>
                <th>Id</th>
                <th>Nombre sede</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $value) : ?>
                <tr>
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["nombre"] ?></td>
                    <td  width="120">
                        <?php if ($value["estado"] == 1) : ?>
                            <a href="<?= URL ?>/sedes/update/&id=<?= $value["id"] ?>&status=0" class="nav-link badge bg-success">Activo</a>
                        <?php else : ?>
                            <a href="<?= URL ?>/sedes/update&id=<?= $value["id"] ?>&status=1" class="nav-link badge bg-danger">Inactivo</a>
                        <?php endif; ?>
                    </td>
                    <td width="80">
                        <a href="<?= URL ?>/sedes/editar/&id=<?= $value["id"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aun</p>
<?php endif; ?>