<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Camarero;
use Livewire\WithPagination;
//para fecha y hora
use Carbon\Carbon;
class CamareroController extends Component
{
   //paginado para la tabla y el tema es bootstrap     
   use WithPagination;
   protected $paginationTheme = 'bootstrap';
   //creacion de variables 
   public $cam_dni,$cam_apellidos,$cam_nombres,$cam_fechan;
   //Que id es para las acciones
   public $selected_id;
   public $updateMode = false;
   //configuraciones para la tabla
   public $Campo ='cam_id';
   public $OrderBy='desc';
   public $pagination=5;
   public $buscar='';   

   public function render()
   {       
       $info=Camarero::query()
       ->search($this->buscar)
       ->orderBy($this->Campo,$this->OrderBy)
       ->paginate($this->pagination);
       
       return view('livewire.camarero.listar',[
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
       $this->cam_dni = null;
       $this->cam_apellidos = null;
       $this->cam_nombres = null;
       $this->cam_fechan = null;
   }

    //metodo para registrar
    public function store()
    { 
        $this->validate([
        'cam_dni' => 'required',
        'cam_apellidos' => 'required',      
        'cam_nombres' => 'required',
        'cam_fechan' => 'required',         
        ]);

        Camarero::create([ 
            'cam_dni' => $this-> cam_dni,
            'cam_apellidos' => $this-> cam_apellidos,
            'cam_nombres' => $this-> cam_nombres,
            'cam_fechan' => $this-> cam_fechan,            
        ]);
        
        $this->resetInput();
        $this->emit('closeModal');
        $this->emit('msgOK','Camarero Registrado Correctamente');       
    }
    
   //editar
   public function edit($id)
   {
       $record = Camarero::findOrFail($id);

       $this->selected_id = $id; 
       $this->cam_dni = $record-> cam_dni;
       $this->cam_apellidos = $record-> cam_apellidos;
       $this->cam_nombres = $record-> cam_nombres;
       $this->cam_fechan = $record-> cam_fechan;
       
       $this->updateMode = true;
   }

   //actualizar
   public function update()
   {
       $this->validate([
            'cam_dni' => 'required',
            'cam_apellidos' => 'required',      
            'cam_nombres' => 'required',
            'cam_fechan' => 'required',    
           ]);

       if ($this->selected_id) {
           $record = Camarero::find($this->selected_id);
           $record->update([ 
            'cam_dni' => $this-> cam_dni,
            'cam_apellidos' => $this-> cam_apellidos,
            'cam_nombres' => $this-> cam_nombres,
            'cam_fechan' => $this-> cam_fechan, 
           ]);

           $this->resetInput();
           $this->updateMode = false;
           $this->emit('closeModal');
           $this->emit('msgEDIT','Camarero Actualizado Correctamente');  
       }
   }

   //desactivar
   public function disable($id)
   {
       $record=Camarero::find($id);
       $record->update([
           'cam_estado'=>'Desactivado'
       ]);
       $this->emit('msgINFO','Camarero Desactivado Correctamente');   
   }
}
