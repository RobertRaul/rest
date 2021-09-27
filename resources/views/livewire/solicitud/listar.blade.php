<div class="card">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Solicitudes</h3>
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
        @include('livewire.solicitud.crear')
						
        @include('eventos.busqueda')

        <div class="table-responsive">
            <table id="listado" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Mesa</th>
                        <th>Camarero</th>
                        <th>Menu</th>          
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtResult as $r)
                        <tr>
                            <td>{{$r->sol_id}} </td>
                            <td>                               
                                @foreach ($r->mesa as $m)
                                    {{$m->mes_numero}} 
                                @endforeach
                            </td>
                            <td>
                                @foreach ($r->camarero as $c)
                                    {{$c->cam_apellidos}}   {{$c->cam_nombres}} 
                                @endforeach
                            </td>  
                            <td>
                                @foreach ($r->menu as $me)
                                    {{$me->men_nomb}}
                                @endforeach
                            </td>         
                            <td>
                                @if ($r->sol_estado== "Pendiente")
                                <h5><span class="badge badge-info">{{ $r->sol_estado }}</span></h5>
                                @elseif($r->sol_estado== "Aceptado")
                                <h5><span class="badge badge-success">{{ $r->sol_estado }}</span></h5>
                                @else
                                <h5><span class="badge badge-danger">{{ $r->sol_estado }}</span></h5>
                                @endif 
                            </td>              
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{$r->sol_id}})">Editar</button>
                                <button type="button" class="btn btn-danger" wire:click="disable({{$r->sol_id}})">Desactivar</button>
                                <button type="button" class="btn btn-success" wire:click="accept({{$r->sol_id}})">Aceptar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @include('eventos.paginacion')
        </div>
    </div>
</div>