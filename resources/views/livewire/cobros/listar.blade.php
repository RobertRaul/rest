<div class="card">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Cobros</h3>
            </div>
            <div class="col-md-2 float-right">

               <div class="text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>  
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        @include('livewire.cobros.crear')
						
        @include('eventos.busqueda')

        <div class="table-responsive">
            <table id="listado" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Solicitud</th>
                        <th>Comprobante</th>
                        <th>Serie</th>
                        <th>Numero</th>
                        <th>Subtotal</th>
                        <th>Igv</th>
                        <th>Total</th>      
                        <th>Estado</th>
                        <th>Acciones</th>         
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtResult as $r)
                        <tr>
                            <td>{{$r->cob_id}} </td>
                            <td>
                                @foreach ($r->solicitud as $s)
                                Codigo:{{$r->cob_solicitud}} -
                                Mesa: {{$s->sol_mesa}}
                                @endforeach                     
                            </td>
                            <td>{{$r->cob_comproban}} </td>
                            <td>{{$r->cob_serie}} </td>
                            <td>{{$r->cob_numero}} </td>
                            <td>{{$r->con_subtotal}} </td>
                            <td>{{$r->cob_igv}} </td>
                            <td>{{$r->cob_total}} </td>
                            <td>
                                @if ($r->cob_estado== "Ok")
                                <h5><span class="badge badge-success">{{ $r->cob_estado }}</span></h5>
                                @else
                                <h5><span class="badge badge-danger">{{ $r->cob_estado }}</span></h5>
                                @endif </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{$r->cob_id}})">Editar</button>
                                <button type="button" class="btn btn-danger" wire:click="anular({{$r->cob_id}})">Anular</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @include('eventos.paginacion')
        </div>
    </div>
</div>



