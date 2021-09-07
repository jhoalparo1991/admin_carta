<h1 class="text-center text-muted">Slide eliminados</h1>
<hr>
<div class="btn-group py-2">
    <a href="<?= URL ?>/slide/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <a href="<?=URL?>/slide/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
</div>
<?php if (isset($data["sliders"]) && !empty($data["sliders"])) : ?>
    <table class="table py-4" id="table">
        <thead class="head-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Principal</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["sliders"] as $value) : ?>
                <tr>
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["nombre"] ?></td>
                    <td><?=substr($value["descripcion"],0,100) ?></td>
                    <td>
                        <img src="<?=URL?>/public/img/uploads/<?=$value["imagen"] ?>" alt="" width="80">
                    </td>
                    <td><?= $value["imagen_principal"] ?></td>
                    <td width="80">
                        <a href="<?= URL ?>/slide/change_status/&id=<?= $value["id"] ?>&status=1" class="btn btn-danger btn-sm"><i class="fas fa-sync-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aun</p>
<?php endif; ?>