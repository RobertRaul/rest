<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Empleado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>

                <input type="hidden" wire:model="selected_id">

                <div class="form-group">
                    <label for="cam_dni"></label>
                    <input wire:model="cam_dni" type="text" class="form-control" id="cam_dni" placeholder="Numero de DNI">@error('cam_dni') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cam_apellidos"></label>
                    <input wire:model="cam_apellidos" type="text" class="form-control" id="cam_apellidos" placeholder="Apellidos">@error('cam_apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cam_nombres"></label>
                    <input wire:model="cam_nombres" type="text" class="form-control" id="cam_nombres" placeholder="Nombres">@error('cam_nombres') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cam_fechan"></label>
                    <input wire:model="cam_fechan" type="date" class="form-control" id="cam_fechan" placeholder="Fecha Inicio">@error('cam_fechan') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            @if($updateMode ==false)
            <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Registrar</button>
            @else
            <button type="button" wire:click.prevent="update()" class="btn btn-warning close-modal">Actualizar</button>
            @endif
        </div>
      </div>
    </div>
  </div>