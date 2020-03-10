<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <h1><?php echo $titulo_pagina; ?></h1>

    <div class="row mt-5 mb-5">
        <div class="col-12 col-sm-12">
            <?= anchor('usuarios', 'Volver lista de usuarios', array('title' => 'Volver lista de usuarios', 'class' => 'btn btn-primary')); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12">
            <?php
            echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
            ?>
        </div>
    </div>

    <section class="row">
        <div class="col-4 col-sm-4">

            <?php
            echo form_open();


            //INPUT NOMBRE
            echo '<div class="form-group">';
            echo form_label('Nombre', 'id_nombre');
            echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'nombre', 'id' => 'id_nombre', 'autocomplete' => 'off', 'placeholder' => 'Nombre'));
            echo '</div>';

            //INPUT EMAIL
            echo '<div class="form-group">';
            echo form_label('E-mail', 'id_email');
            echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'email', 'id' => 'id_email', 'autocomplete' => 'off'));
            echo '</div>';

            //INPUT CONTRASEÑA
            echo '<div class="form-group">';
            echo form_label('contraseña', 'id_contraseña');
            echo form_input(array('type' => 'password', 'class' => 'form-control', 'name' => 'contraseña', 'id' => 'id_contraseña', 'autocomplete' => 'off'));
            echo '</div>';

            echo '<div class="form-group">';
            echo form_label('Repita contraseña', 'id_contraseña2');
            echo form_input(array('type' => 'password', 'class' => 'form-control', 'name' => 'contraseña2', 'id' => 'id_contraseña2', 'autocomplete' => 'off'));
            echo '</div>';

            echo form_submit('submit', 'Login', array('class' => 'btn btn-outline-success btn-block'));


            echo form_close();
            ?>

        </div>
    </section>
</main>