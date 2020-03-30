<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1><?php echo $titulo_pagina; ?></h1>
          
          <section class="row mt-3 mb-3">
          	<div class="col-12 col-sm-12">
                    <?= anchor('libros', 'Volver lista libros', ['title' => 'Volver a lista de libros', 'class' => 'btn btn-primary']);?>
          	</div>
          </section>
          
          <section class="row">
          	<div class="col-12 col-sm-12">
                    <?= validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
          	</div>
          </section>
          
          <section class="row">
          	<div class="col-12 col-sm-12">
                    <?= form_open() ?>
                        <div class="form-group">
                            <?= form_label('Título') ?>
                            <?= form_input([
                                'type'        => 'text', 
                                'class'       => 'form-control', 
                                'name'        => 'titulo', 
                                'placeholder' => 'Título de libro'
                            ]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Autor') ?>
                            <?= form_input([
                                'type'        => 'text', 
                                'class'       => 'form-control', 
                                'name'        => 'autor', 
                                'placeholder' => 'Autor de libro'
                            ]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Precio') ?>
                            <?= form_input([
                                'type'        => 'text', 
                                'class'       => 'form-control', 
                                'name'        => 'precio', 
                                'placeholder' => 'Precio de libro'
                            ]) ?>
                        </div>
                    
                    <div class="form-group">
                        <?= form_label('Resumen') ?>
                        <?= form_textarea('resumen', '', ['class' => 'form-control']) ?>
                    </div>
                    
                    <div class="form-group">
                        <?= form_label('Activo') ?>
                        <?= form_dropdown('activo', [1 => 'Si', 0 => 'No'], 1, ['class' => 'form-control']) ?>
                    </div>
                    
                    <hr class="mt-5">
                    <?= form_submit('submit', 'Registrar libro', ['class' => 'btn btn-success mt-3 mb-5']) ?>
                    
                    <?= form_close() ?>
          	</div>
          </section>
</main>