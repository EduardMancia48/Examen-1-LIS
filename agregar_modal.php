<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


			<center>
				<h4 class="modal-title" id="myModalLabel">Agregar un producto</h4>
			</center>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="add.php">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Codigo:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="codigo">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Nombre producto:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre_producto" required>

							</div>
						</div>


						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Descripcion:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-lg" name="descripcion" required>
							</div>
						</div>

						<div class="form-group">
							<label for="img" class="col-sm-2 control-label">Imagen</label>
							<div class="col-sm-10">
								<input type="file" id="img" name="img" accept=".jpg,.jpeg,.png" style="padding:10px">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Categoria:</label>
							</div>
							<div class="col-sm-10">
								<select class="form-control" name="categoria">
									<option value="1">Textil</option>
									<option value="2">Promocional</option>

								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Precio:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="precio">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Existencias: </label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="existencias">

							</div>
						</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>

					</form>
			</div>

		</div>
	</div>
</div>