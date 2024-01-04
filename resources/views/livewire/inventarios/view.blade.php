@section('title', __('Inventarios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-warehouse"></i>
							Listado de inventario </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar ...">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo artículo
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.inventarios.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Descripcion</th>
								<th>No. inventario</th>
								<th>Almacen</th>
								<th>Clave presupuestal</th>
								<th>Fuente de recurso</th>
								<th>Cuenta bancaria</th>
								<th>Banco</th>
								<th>Empleado </th>
								<th>Costo</th>
								<th>Cantidad</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($inventarios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ mb_strtoupper( $row->descripcion ?? '')}}</td>
								<td>{{ mb_strtoupper($row->noinv ?? '')}}
								<td>{{ $row->almacen }}</td>
								<td>{{ mb_strtoupper($row->claves->descripcion ?? '') }}</td>
								<td>{{ mb_strtoupper($row->fuentes->descripcion ?? '') }}</td>
								<td>{{ mb_strtoupper($row->cuentas->descripcion ?? '') }}</td>
								<td>{{ mb_strtoupper($row->cuentas->bancos->descripcion ?? '') }}</td>
								<td>{{ mb_strtoupper($row->empleados->nombre ?? '') }}</td>
								<td>$ {{  number_format( $row->costo,2) }}</td>
								<td>{{ $row->cantidad }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Inventario id {{$row->id}}? \nDeleted Inventarios cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $inventarios->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>