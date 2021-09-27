<div class="card">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Clientes</h3>
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
        @include('livewire.cliente.crear')
						
        @include('eventos.busqueda')

        <div class="table-responsive">
            <table id="listado" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Direccion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtResult as $r)
                        <tr>
                            <td>{{$r->clien_id}} </td>
                            <td>{{$r->clien_nombres}} </td>
                            <td>{{$r->clien_direcc}} </td>                           
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{$r->clien_id}})">Editar</button>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @include('eventos.paginacion')
        </div>
    </div>
</div>