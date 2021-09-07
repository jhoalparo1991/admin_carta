<h1 class="text-center text-muted">Listado de usuarios</h1>
<hr>
<div class="btn-group py-2">
    <a href="<?= URL ?>/usuarios/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
</div>
<small class="text-danger"><?=Sessions::getSession("error_password")?></small>
<?php if (isset($data["usuarios"]) && !empty($data["usuarios"])) : ?>
    <table class="table py-4" id="table">
        <thead class="head-dark">
            <tr>
                <th>Id</th>
                <th>Nombres y apellidos</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["usuarios"] as $value) : ?>
                <tr>
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["nombres"].' '.$value["apellidos"] ?></td>
                    <td><?= $value["correo"] ?></td>
                    <td><?= $value["rol"] ?></td>
                    <td width="100">
                    <?php if ($value["estado"] == 1) : ?>
                            <a href="<?= URL ?>/usuarios/change_status&id=<?= $value["id"] ?>&status=0" class="nav-link badge bg-success">Activo</a>
                        <?php else : ?>
                            <a href="<?= URL ?>/usuarios/change_status&id=<?= $value["id"] ?>&status=1" class="nav-link badge bg-danger">Inactivo</a>
                        <?php endif; ?>
                    </td>
                    <td width="60">
                        <a href="<?= URL ?>/usuarios/get_one_edit/&id=<?= $value["id"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= URL ?>/usuarios/password_reset/&id=<?= $value["id"] ?>" class="btn btn-success btn-sm"><i class="fas fa-key"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aun</p>
<?php endif; ?>
<?php 
    Sessions::deleteSession("error_password");
?>