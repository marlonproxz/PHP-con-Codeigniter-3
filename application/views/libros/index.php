<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1><?php echo $titulo; ?></h1>

          <section class="row">
          	<div class="col-12 col-sm-12">

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Fecha de Registro</th>
							<th>Nombre</th>
							<th>Autor</th>
							<th>Precio</th>
							<th>Ver más</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($libros as $libro) : ?>
							<tr>
								<td><?php echo $libro->id; ?></td>
								<td><?php echo formatoFecha($libro->fecha_registro); ?></td>
								<td><?php echo $libro->nombre_libro; ?></td>
								<td><?php echo $libro->autor_libro; ?></td>
								<td><?php echo formatoMoneda($libro->precio); ?></td>
								<td><?php echo anchor('site/info/'. $libro->id, 'info', array('title' => 'Mas información', 'class' => 'btn btn-info')) . ' '.anchor_popup('site/info/'. $libro->id, 'info', array('title' => 'Mas información', 'class' => 'btn btn-success')); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>


          	</div>
          </section>
</main>