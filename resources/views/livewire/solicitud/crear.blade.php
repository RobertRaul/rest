<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Solicitudes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>

                <input type="hidden" wire:model="selected_id">

                <div class="form-group">
                  <label>Mesas</label>
                  <select wire:model="sol_mesa" class="form-control">
             
                    @foreach ($mesas as $m)
                    <option value="{{ $m->mes_id }}">{{ $m->mes_numero }}</option>
                    @endforeach
                </select>  
                </div>

                <div class="form-group">
                  <label>Camareros</label>
                  <select wire:model="sol_camare" class="form-control">
            
                    @foreach ($camareros as $m)
                    <option value="{{ $m->cam_id }}">{{ $m->cam_apellidos}} {{$m->cam_nombres }}</option>
                    @endforeach
                </select> 
               </div>

                <div class="form-group">
                  <label>Menu</label>
                    <select wire:model="sol_menu" class="form-control">
                                   }
                    @foreach ($menu as $m)
                    <option value="{{ $m->men_id }}">{{ $m->men_nomb }}</option>
                    @endforeach
                </select> 
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