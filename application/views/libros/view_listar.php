<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <h1><?php echo $titulo_pagina; ?></h1>

    <section class="row mb-5">
        <div class="col-12 col-sm-12 text-right">
            <?= anchor('libros/adicionar', 'Add libro', array('title' => 'Add libro', 'class' => 'btn btn-success')); ?>
        </div>
    </section>

    <section class="row">
        <div class="col-12 col-sm-12">
            <?= $this->session->userdata('msg'); ?>
        </div>
    </section>

    <section class="row">
        <div class="col-12 col-sm-12">
            <table class="table" id="table_ismweb_listar">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th class="text-right">Precio</th>
                        <th class="text-center">Estado</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $l) { ?>
                        <tr>
                            <th scope="row"><?= $l->id ?></th>
                            <td><?= $l->titulo ?></td>
                            <td><?= $l->autor ?></td>
                            <td class="text-right"><?= $l->precio ?></td>
                            <td class="text-center"><?= ($l->activo == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>'); ?></td>
                            <td class="text-right">
                                <?= anchor('libros/editar/' . $l->id, 'Editar', ['title' => 'Editar', 'class' => 'btn btn-primary']); ?>
                                <?= anchor('libros/eliminar/' . $l->id, 'Eliminar', ['title' => 'Eliminar', 'class' => 'btn btn-danger']); ?>
                                <?php if ($l->activo == 1) { ?>
                                    <?= anchor('libros/desactivar/' . $l->id, 'Desactivar', ['title' => 'Desactivar', 'class' => 'btn btn-info']); ?>
                                <?php } else { ?>
                                    <?= anchor('libros/activar/' . $l->id, 'Activar', ['title' => 'Activar', 'class' => 'btn btn-info']); ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </section>
</main>