<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1><?php echo $titulo; ?></h1>

          <section class="row">
          	<div class="col-12 col-sm-12">

          		<?php echo anchor('site/libros', 'Listar libros', array('title' => 'Listar libros', 'class' => 'btn btn-secondary m-header' )) ?>

				<table class="table table-bordered table-striped">
					<thead>
						<th>ID</th>
						<th>Fecha de Registro</th>
						<th>Nombre</th>
						<th>Autor</th>
						<th>Precio</th>
						
					</thead>
					<tbody>
						<?php  
							//echo '<pre>'
								//print_r($info);
						?>
						<tr>
							<td><?php echo $info->id;?></td>
							<td><?php echo formatoFecha($info->fecha_registro);?></td>

							<td><?php echo $info->nombre_libro;?></td>
							<td><?php echo $info->autor_libro;?></td>
							<td><?php echo formatoMoneda($info->precio);?></td>
						</tr>
						<tr><td colspan="5"><?php echo $info->resumen;?></td></tr>
					</tbody>
				</table>


          	</div>
          </section>
</main>