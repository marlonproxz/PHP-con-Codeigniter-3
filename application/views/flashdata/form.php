<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1><?php echo $titulo; ?></h1>

          <section class="row">
          	<div class="col-12 col-sm-12">
                <?= $this->session->flashdata('msg'); ?>
            </div>
          </section>

          <section class="row">
          	<div class="col-4 col-sm-4">
                <?php
                    echo form_open(current_url(), ['id' => 'form', 'name' => 'form', 'class' => '']);
                        echo form_label('Valor', 'valor');
                        echo '<br>';
                        echo form_input(['name' => 'valor', 'autocomplete' => 'off'], set_value('valor'), '');
                        echo '<br>';
                        echo '<hr>';
                        echo '<br>';
                        echo form_submit('submit', 'Enviar');
                    echo form_close();
                ?>
            </div>
          </section>
</main>