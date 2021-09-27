<div class="card">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Menus</h3>
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
        @include('livewire.menu.crear')
						
        @include('eventos.busqueda')

        <div class="table-responsive">
            <table id="listado" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtResult as $r)
                        <tr>
                            <td>{{$r->men_id}} </td>
                            <td>{{$r->men_nomb}} </td>
                            <td>{{$r->men_descripcion}} </td>
                            <td>{{$r->men_fech}} </td>
                            <td>
                                @if ($r->men_estado== "Activo")
                                <h5><span class="badge badge-success">{{ $r->men_estado }}</span></h5>
                                @else
                                <h5><span class="badge badge-danger">{{ $r->men_estado }}</span></h5>
                                @endif 
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{$r->men_id}})">Editar</button>
                                <button type="button" class="btn btn-danger" wire:click="disable({{$r->men_id}})">Desactivar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @include('eventos.paginacion')
        </div>
    </div>
</div>