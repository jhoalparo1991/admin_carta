<h1 class="text-center text-muted">Productos eliminados</h1>
<hr>
<div class="btn-group py-2">
    <a href="<?= URL ?>/productos/crear" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <a href="<?=URL?>/productos/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
</div>

<?php if (isset($data["productos"]) && !empty($data["productos"])) : ?>
    <table class="table py-4" id="table">
        <thead class="head-dark">
            <tr>
                <th>Id</th>
                <th>Articulo</th>
                <th>Categoria</th>
                <th>Precio 1</th>
                <th>Precio 2</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["productos"] as $value) : ?>
                <tr>
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["articulo"] ?></td>
                    <td><?= $value["categoria"] ?></td>
                    <td><?= $value["precio_1"] ?></td>
                    <td><?= $value["precio_2"] ?></td>
                    <td width="80">
                    <a href="<?= URL ?>/productos/change_status/&id=<?= $value["id"] ?>&status=1" class="btn btn-danger btn-sm"><i class="fas fa-sync-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aun</p>
<?php endif; ?>