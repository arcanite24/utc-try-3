<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$niv->id_materia}} ">
	{{Form::Open(array('action'=>array('MateriaController@destroy',$niv->id_nivel),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" arial-Label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Nivel</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea eliminar el Nivel</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
			</div>
		</div>
	</div>
	{{Form::CLose()}}
</div>