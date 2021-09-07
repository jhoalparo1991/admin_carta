<h1 class="text-center text-muted">Articulos eliminados</h1>
<hr>
<div class="btn-group py-2">
<a href="<?=URL?>/articulos/index" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i>
    Volver</a>
</div>

<?php if (isset($data["articulos"]) && !empty($data["articulos"])) : ?>
    <table class="table py-4" id="table">
        <thead class="head-dark">
            <tr>
            <th>Id</th>
                <th>Articulo</th>
                <th>Categoria</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["articulos"] as $value) : ?>
                <tr>
                    <th  width="80"><?= $value["id"] ?></th>
                    <td><?= $value["nombre"] ?></td>
                    <td><?= $value["categoria"] ?></td>
                    <td width="80">
                        <a href="<?= URL ?>/articulos/change_status/&id=<?= $value["id"] ?>&status=1" class="btn btn-danger btn-sm"><i class="fas fa-sync-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="h3 text-center text-muted">No tienes registros aun</p>
<?php endif; ?>