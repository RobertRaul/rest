<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Cobros</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>

                <input type="hidden" wire:model="selected_id">

                <div class="form-group">        
                    <label for="cob_serie">Solicitudes Pendientes</label>
                    <select wire:model="cob_solicitud" class="form-control">
                        <option value="ELEGIR">ELEGIR</option>
                    @foreach ($solicitudes as $s)
                        <option value="{{$s->sol_id}}">Codigo de Solicitud:{{ $s->sol_id}} Mesa:{{$s->sol_mesa}} </option>
                    @endforeach
                    @error('cob_serie') <span class="error text-danger">{{ $cob_solicitud }}</span> @enderror
                        
                  </select> 
                </div>          
               
                <div class="form-group">            
                    <label for="cob_comproban">Comprobante</label>
                    <select wire:model="cob_comproban" class="form-control">
                        <option value="Boleta">Boleta</option>
                        <option value="Factura">Factura</option>
                        <option value="Ticket">Ticket</option>                 
                  </select> 
                  @error('cob_serie') <span class="error text-danger">{{ $cob_comproban }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cob_serie"></label>
                    <input wire:model="cob_serie" type="text" class="form-control" id="cob_serie" placeholder="Serie">@error('cob_serie') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cob_numero"></label>
                    <input wire:model="cob_numero" type="number" class="form-control" id="cob_numero" placeholder="Numero">@error('cob_numero') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="con_subtotal"></label>
                    <input wire:model="con_subtotal" type="number" class="form-control" id="con_subtotal" placeholder="Subtotal">@error('con_subtotal') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cob_igv"></label>
                    <input wire:model="cob_igv" type="number" class="form-control" id="cob_igv" placeholder="Igv">@error('cob_igv') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cob_total"></label>
                    <input wire:model="cob_total" type="text" class="form-control" id="cob_total" placeholder="Total">@error('cob_total') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  
            <button type="button" wire:click.prevent="store()" class="btn btn-primary">Registrar</button>
       
        </div>
      </div>
    </div>
  </div>