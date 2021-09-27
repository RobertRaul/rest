<div class="card">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Camareros</h3>
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
        @include('livewire.camarero.crear')
						
        @include('eventos.busqueda')

        <div class="table-responsive">
            <table id="listado" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Dni</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Fecha Inicio</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtResult as $r)
                        <tr>
                            <td>{{$r->cam_id}} </td>
                            <td>{{$r->cam_dni}} </td>
                            <td>{{$r->cam_apellidos}} </td>  
                            <td>{{$r->cam_nombres}} </td>  
                            <td>{{$r->cam_fechan}} </td>             
                            <td>
                                @if ($r->cam_estado== "Activo")
                                <h5><span class="badge badge-success">{{ $r->cam_estado }}</span></h5>
                                @else
                                <h5><span class="badge badge-danger">{{ $r->cam_estado }}</span></h5>
                                @endif 
                            </td>              
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{$r->cam_id}})">Editar</button>
                                <button type="button" class="btn btn-danger" wire:click="disable({{$r->cam_id}})">Desactivar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @include('eventos.paginacion')
        </div>
    </div>
</div>