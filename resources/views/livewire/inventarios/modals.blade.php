<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Nuevo artículo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">No inventario</label>
                        <input wire:model="noinv" type="text" class="form-control" id="noinv" placeholder="No inventario">@error('noinv') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group ">
                        <label for="almacen" >Almacén</label>
                              <select wire:model="almacen" name="almacen" id="almacen" class="form-control">
                                 <option>--Se encuentra en almacén--</option>  
                                  <option  value="0">{{ mb_strtoupper("no") }}</option>
                                  <option  value="1">{{ mb_strtoupper("si") }}</option>
                            </select> 
                    </div>
                    <div class="form-group ">
                        <label for="claves_id" >Clave presupuestal</label>
                              <select wire:model="claves_id" name="claves_id" id="claves_id" class="form-control">
                                 <option>--Seleccione una clave bancaria--</option>  
                                 @foreach ($claves as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>

                    <div class="form-group ">
                        <label for="cuentas_id" >Cuenta bancaria</label>
                              <select wire:model="cuentas_id" name="cuentas_id" id="cuentas_id" class="form-control">
                                 <option>--Seleccione una cuenta--</option>  
                                 @foreach ($cuentas as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group ">
                        <label for="fuentes_id" >Fuente de recurso</label>
                              <select wire:model="fuentes_id" name="fuentes_id" id="fuentes_id" class="form-control">
                                 <option>--Seleccione una fuente de recurso--</option>  
                                 @foreach ($fuentes as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group d-none">
                        <label for="bancos_id" >Bancos</label>
                              <select wire:model="bancos_id" name="bancos_id" id="bancos_id" class="form-control">
                                 <option>--Seleccione un banco--</option>  
                                 @foreach ($bancos as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group ">
                        <label for="empleados_id" >Empleados</label>
                              <select wire:model="empleados_id" name="empleados_id" id="empleados_id" class="form-control">
                                 <option>--Seleccione un empleado--</option>  
                                 @foreach ($empleados as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->nombre) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group">
                        <label for="costo"></label>
                        <input wire:model="costo" type="text" class="form-control" id="costo" placeholder="Costo">@error('costo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cantidad"></label>
                        <input wire:model="cantidad" type="text" class="form-control" id="cantidad" placeholder="Cantidad">@error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Editar artículo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">No inventario</label>
                        <input wire:model="noinv" type="text" class="form-control" id="noinv" placeholder="No inventario">@error('noinv') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group ">
                        <label for="almacen" >Almacén</label>
                              <select wire:model="almacen" name="almacen" id="almacen" class="form-control">
                                 <option>--Se encuentra en almacén--</option>  
                                  <option  value="0">{{ mb_strtoupper("no") }}</option>
                                  <option  value="1">{{ mb_strtoupper("si") }}</option>
                            </select> 
                    </div>
                    <div class="form-group ">
                        <label for="claves_id" >Clave presupuestal</label>
                              <select wire:model="claves_id" name="claves_id" id="claves_id" class="form-control">
                                 <option>--Seleccione una clave bancaria--</option>  
                                 @foreach ($claves as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>

                    <div class="form-group ">
                        <label for="cuentas_id" >Cuenta bancaria</label>
                              <select wire:model="cuentas_id" name="cuentas_id" id="cuentas_id" class="form-control">
                                 <option>--Seleccione una cuenta--</option>  
                                 @foreach ($cuentas as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group ">
                        <label for="fuentes_id" >Fuente de recurso</label>
                              <select wire:model="fuentes_id" name="fuentes_id" id="fuentes_id" class="form-control">
                                 <option>--Seleccione una fuente de recurso--</option>  
                                 @foreach ($fuentes as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group d-none">
                        <label for="bancos_id" >Bancos</label>
                              <select wire:model="bancos_id" name="bancos_id" id="bancos_id" class="form-control">
                                 <option>--Seleccione un banco--</option>  
                                 @foreach ($bancos as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->descripcion) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group ">
                        <label for="empleados_id" >Empleados</label>
                              <select wire:model="empleados_id" name="empleados_id" id="empleados_id" class="form-control">
                                 <option>--Seleccione un empleado--</option>  
                                 @foreach ($empleados as $row) 
                                  <option  value="{{ $row->id }}">{{ mb_strtoupper($row->nombre) }}</option>
                                 @endforeach
                            </select> 
                    </div>
                    <div class="form-group">
                        <label for="costo"></label>
                        <input wire:model="costo" type="text" class="form-control" id="costo" placeholder="Costo">@error('costo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cantidad"></label>
                        <input wire:model="cantidad" type="text" class="form-control" id="cantidad" placeholder="Cantidad">@error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
