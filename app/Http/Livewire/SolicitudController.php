<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
//para fecha y hora
use Carbon\Carbon;
use App\Models\Solicitud;
use App\Models\Mesa;
use App\Models\Menu;
use App\Models\Camarero;

class SolicitudController extends Component
{
    //paginado para la tabla y el tema es bootstrap     
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //creacion de variables 
    public $sol_mesa,$sol_camare,$sol_menu;
    public $mesas,$camareros,$menu;
    //Que id es para las acciones
    public $selected_id;
    public $updateMode = false;
    //configuraciones para la tabla
    public $Campo ='sol_id';
    public $OrderBy='desc';
    public $pagination=5;
    public $buscar='';   
 
    public function render()
    {   
        $this->mesas=Mesa::where('mes_estado','Activo')->get();
        $this->camareros=Camarero::where('cam_estado','Activo')->get();
        $this->menu=Menu::where('men_estado','Activo')->get();

        $info=Solicitud::query()
        ->search($this->buscar)
        ->orderBy($this->Campo,$this->OrderBy)
        ->paginate($this->pagination);
        
        return view('livewire.solicitud.listar',[
            'dtResult' =>$info,
        ]);
    }  
 
     //cancelacion y limpiar inputs
     public function cancel()
     {
         $this->resetInput();
         $this->updateMode = false;
     }
 
     //metodo para limpiar imputs
    private function resetInput()
    {		
        $this->selected_id = null;
        $this->sol_mesa = null;
        $this->sol_camare = null;
        $this->sol_menu = null;
    }
 
     //metodo para registrar
     public function store()
     { 
         $this->validate([
         'sol_mesa' => 'required',
         'sol_camare' => 'required',      
         'sol_menu' => 'required',       
         ]);
 
         Solicitud::create([ 
             'sol_mesa' => $this-> sol_mesa,
             'sol_camare' => $this-> sol_camare,
             'sol_menu' => $this-> sol_menu,           
         ]);
         
         $this->resetInput();
         $this->emit('closeModal');
         $this->emit('msgOK','Solicitud Registrada Correctamente');       
     }
     
    //editar
    public function edit($id)
    {
        $record = Solicitud::findOrFail($id);
 
        $this->selected_id = $id; 
        $this->sol_mesa = $record-> sol_mesa;
        $this->sol_camare = $record-> sol_camare;
        $this->sol_menu = $record-> sol_menu;
        
        $this->updateMode = true;
    }
 
    //actualizar
    public function update()
    {
        $this->validate([
             'sol_mesa' => 'required',
             'sol_camare' => 'required',      
             'sol_menu' => 'required',    
            ]);
 
        if ($this->selected_id) {
            $record = Solicitud::find($this->selected_id);
            $record->update([ 
             'sol_mesa' => $this-> sol_mesa,
             'sol_camare' => $this-> sol_camare,
             'sol_menu' => $this-> sol_menu,
            ]);
 
            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
            $this->emit('msgEDIT','Solicitud Actualizada Correctamente');  
        }
    }
 
    //desactivar
    public function disable($id)
    {
        $record=Solicitud::find($id);
        $record->update([
            'sol_estado'=>'Desactivado'
        ]);
        $this->emit('msgINFO','Solicitud Desactivada Correctamente');   
    }

     //aceptar
     public function accept($id)
     {
         $record=Solicitud::find($id);
         $record->update([
             'sol_estado'=>'Aceptado'
         ]);
         $this->emit('msgOK','Solicitud Aceptada');   
     }
}
