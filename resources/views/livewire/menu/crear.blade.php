<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>

                <input type="hidden" wire:model="selected_id">

                <div class="form-group">
                    <label for="men_nomb"></label>
                    <input wire:model="men_nomb" type="text" class="form-control" id="men_nomb" placeholder="Nombre del Menu">@error('men_nomb') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="men_descripcion"></label>
                    <input wire:model="men_descripcion" type="text" class="form-control" id="men_descripcion" placeholder="Descripcion del Menu">@error('men_descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="men_fech"></label>
                    <input wire:model="men_fech" type="date" class="form-control" id="men_fech" placeholder="Fecha">@error('men_fech') <span class="error text-danger">{{ $message }}</span> @enderror
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