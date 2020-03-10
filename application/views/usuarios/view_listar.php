<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1><?php echo $titulo_pagina; ?></h1>

        <section class="row mb-5">
            <div class="col-12 col-sm-12 text-right">
            <?php echo anchor('usuarios/adicionar', 'Add usuario', array('title' => 'Add usuario', 'class' => 'btn btn-success' )) ?>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-sm-12">
                <?= $this->session->userdata('msg'); ?>
            </div>
        </div>

        <section class="row">
            <div class="col-12 col-sm-12">
                <table class="table" id="table_ismweb_listar">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th class="text-center">Activo</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr>
                                <th scope="row"><?= $usuario->nombre; ?></th>
                                <td><?= $usuario->email; ?></td>
                                <td>
                                    <?= ($usuario->activo == 1 ? '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>'); ?>
                                </td>
                                <td class="text-right">
                                    <?= anchor('usuarios/editar/'.$usuario->id, 'Editar', array('title' => 'Editar', 'class' => 'btn btn-primary')); ?>
                                    <?= anchor('usuarios/apagar/'.$usuario->id, 'Eliminar', array('title' => 'Eliminar', 'class' => 'btn btn-danger')); ?>
                                    <?php if($usuario->activo == 1) { ?>
                                        <?= anchor('usuarios/inactivo/'.$usuario->id, 'Desactivar', array('title' => 'Desactivar', 'class' => 'btn btn-info')); ?>
                                    <?php } else{ ?>
                                        <?= anchor('usuarios/activo/'.$usuario->id, 'Activar', array('title' => 'Activar', 'class' => 'btn btn-info')); ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
</main>