<h1 class="text-center text-muted">Productos ofertas</h1>
<hr>
<div class="btn-group py-2">
    <a href="<?= URL ?>/ofertas/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <a href="<?= URL ?>/ofertas/eliminados" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminados</a>
</div>
<?php if (isset($data["ofertas"]) && !empty($data["ofertas"])) : ?>
    <table class="table py-4" id="table">
        <thead class="head-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["ofertas"] as $value) : ?>
                <tr>
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["nombre"] ?></td>
                    <td><?= $value["precio"] ?></td>
                    <td><?=substr($value["descripcion"],0,100) ?>...</td>
                    <td>
                        <img src="<?=URL?>/public/img/uploads/<?=$value["imagen"] ?>" alt="" width="80">
                    </td>
                    <td width="80">
                        <a href="<?= URL ?>/ofertas/get_one_edit&id=<?= $value["id"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= URL ?>/ofertas/change_status/&id=<?= $value["id"] ?>&status=0" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aun</p>
<?php endif; ?>