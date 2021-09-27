<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Mesa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>

                <input type="hidden" wire:model="selected_id">

                <div class="form-group">
                    <label for="mes_numero"></label>
                    <input wire:model="mes_numero" type="text" class="form-control" id="mes_numero" placeholder="Numero de la Mesa">@error('mes_numero') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="mes_sillas"></label>
                    <input wire:model="mes_sillas" type="text" class="form-control" id="mes_sillas" placeholder="Numero de Sillas">@error('mes_sillas') <span class="error text-danger">{{ $message }}</span> @enderror
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