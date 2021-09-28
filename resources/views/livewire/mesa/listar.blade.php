<div class="card">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Mesas</h3>
            </div>
            <div class="col-md-2 float-right">

               <div class="text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>

                    <button type="button" class="btn btn-warning" wire:click="ReporteMesas()">
                    Reporte
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        @include('livewire.mesa.crear')

        @include('eventos.busqueda')

        <div class="table-responsive">
            <table id="listado" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Numero</th>
                        <th>Sillas</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtResult as $r)
                        <tr>
                            <td>{{$r->mes_id}} </td>
                            <td>{{$r->mes_numero}} </td>
                            <td>{{$r->mes_sillas}} </td>
                            <td>
                                @if ($r->mes_estado== "Activo")
                                <h5><span class="badge badge-success">{{ $r->mes_estado }}</span></h5>
                                @else
                                <h5><span class="badge badge-danger">{{ $r->mes_estado }}</span></h5>
                                @endif </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{$r->mes_id}})">Editar</button>
                                <button type="button" class="btn btn-danger" wire:click="disable({{$r->mes_id}})">Desactivar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @include('eventos.paginacion')
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded',function(){
  window.livewire.on('pdf_mesa',ticket =>
        {
            var ruta="{{ url('pdfmesas')}}"
            var w =window.open(ruta)
            //var w =window.open(ruta,"_blank","width=1,height=1")
           // w.close()//cierra la ventana de impresion
        })
    })
</script>
