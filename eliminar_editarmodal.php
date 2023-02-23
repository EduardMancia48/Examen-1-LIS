<!--- Editar --->
<div class="modal fade" id="edit_<?php echo $row->codigo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="edit.php">
                <div class="modal-header">
                 
                    <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo">Código:</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $row->codigo; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>">
                    </div>
					<div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <select id="categoria" name="categoria" class="form-control">
                            <option value="Ropa"<?php if ($row->categoria == "Promocional") echo " selected"; ?>>Promocional</option>
                            <option value="Accesorios"<?php if ($row->categoria == "Textil") echo " selected"; ?>>Textil</option>
                          
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" id="precio" name="precio" class="form-control" value="<?php echo $row->precio; ?>">
                    </div>
                    <div class="form-group">
                        <label for="existencias">Existencias:</label>
                        <input type="number" id="existencias" name="existencias" class="form-control" value="<?php echo $row->existencias; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $row->codigo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
       
                <center><h4 class="modal-title" id="myModalLabel">Eliminar producto</h4></center>
            </div>
            <div class="modal-body">    
                <p class="text-center">¿Estás seguro de que quieres eliminar el siguiente producto?</p>
                <h2 class="text-center"><?php echo $row->nombre; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="delete.php?codigo=<?php echo $row->codigo; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Sí</a>
            </div>
        </div>
    </div>
</div>
