<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1><?php echo $titulo; ?></h1>

          <section class="row">
          	<div class="col-4 col-sm-4">
				
				<?php

					echo form_open('site/enviar');

				
						//INPUT EMAIL
						echo '<div class="form-group">';
						echo form_label('E-mail', 'id_email');
						echo form_input(array('type'=>'text', 'class'=>'form-control', 'name' => 'email', 'id' => 'id_email', 'autocomplete' => 'off'));

						//INPUT SENHA
						echo form_label('Password', 'id_password');
						echo form_input(array('type'=>'password', 'class'=>'form-control', 'name' => 'password', 'id' => 'id_password', 'autocomplete' => 'off'));
						echo '</div>';

						echo form_submit('submit', 'Login', array('class' => 'btn btn-outline-success btn-block'));


						 /*$att = array(
									'type'	=>	'text',
									'name'	=>	'nombre_input',
									'id'	=>	'id_input',
									'value'	=>	'',
									'class'	=>	'form-control'
						);
						echo form_label('nombre', 'id_input');
						echo form_input($att);

						echo form_label('Caja de texto', 'id_texto');
						echo form_textarea(array('name' => 'texto', 'id' => 'id_texto', 'class' => 'form-control'));

						$options = array(
										'small'		=>	'Small Shirt',
										'med'		=>	'Medium Shirt',
										'large'		=>	'Large Shirt',
										'xlarge'	=>	'Extra large shirt'
						);*/

						//$shirts_on_sale = array('small', 'large');
						/*echo form_dropdown('shirts', $options, '', array('name' => 'texto', 'id' => 'id_texto', 'class' => 'form-control'));*/
				
				
					echo form_close();
				?>

          	</div>
          </section>
</main>