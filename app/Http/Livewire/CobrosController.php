<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cobros;
use App\Models\Solicitud;

class CobrosController extends Component
{
     //paginado para la tabla y el tema es bootstrap     
     use WithPagination;
     protected $paginationTheme = 'bootstrap';
     //creacion de variables 
     public $cob_solicitud,$cob_comproban,$cob_serie,$cob_numero,$con_subtotal,$cob_igv,$cob_total;
     //Que id es para las acciones
     public $selected_id;
     public $updateMode = false;
     //configuraciones para la tabla
     public $Campo ='cob_id';
     public $OrderBy='desc';
     public $pagination=5;
     public $buscar='';   
 
     public function render()
     {       
        $this->solicitudes=Solicitud::where('sol_estado','Aceptado')->get();

         $info=Cobros::query()
         ->search($this->buscar)
         ->orderBy($this->Campo,$this->OrderBy)
         ->paginate($this->pagination);
         
         return view('livewire.cobros.listar',[
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
        //Que id es para las acciones
         $this->selected_id = null;
         $this->cob_solicitud = null;
         $this->cob_comproban = null;
         $this->cob_serie = null;
         $this->cob_numero = null;
         $this->con_subtotal = null;
         $this->cob_igv = null;
         $this->cob_total = null;
      
     }
 
      //metodo para registrar
      public function store()
      { 
 
          $this->validate([
          'cob_solicitud' => 'required',
          'cob_comproban' => 'required',      
          'cob_serie' => 'required',  
          'cob_numero' => 'required',  
          'con_subtotal' => 'required',  
          'cob_igv' => 'required',  
          'cob_total' => 'required',  
          ]);
  
          Cobros::create([ 
              'cob_solicitud' => $this-> cob_solicitud,
              'cob_comproban' => $this-> cob_comproban,
              'cob_serie' => $this-> cob_serie,
              'cob_numero' => $this-> cob_numero,
              'con_subtotal' => $this-> con_subtotal,
              'cob_igv' => $this-> cob_igv,
              'cob_total' => $this-> cob_total,
          ]);
          
          $this->resetInput();
          $this->emit('closeModal');
          $this->emit('msgOK','Cobro Registrado Correctamente');       
      }
      
     //editar
     public function edit($id)
     {
         $record = Cobros::findOrFail($id);
 
         $this->selected_id = $id; 

         $this->cob_solicitud = $record-> cob_solicitud;
         $this->cob_comproban = $record-> cob_comproban;
         $this->cob_serie = $record-> cob_serie;
         $this->cob_numero = $record-> cob_numero;
         $this->con_subtotal = $record-> con_subtotal;
         $this->cob_igv = $record-> cob_igv;
         $this->cob_total = $record-> cob_total;

        $this->updateMode = true;
     }
 
     //actualizar
     public function update()
     {
         $this->validate([
                'cob_solicitud' => 'required',
                'cob_comproban' => 'required',      
                'cob_serie' => 'required',  
                'cob_numero' => 'required',  
                'con_subtotal' => 'required',  
                'cob_igv' => 'required',  
                'cob_total' => 'required',     
             ]);
 
         if ($this->selected_id) {
             $record = Cobros::find($this->selected_id);
             $record->update([ 
                'cob_solicitud' => $this-> cob_solicitud,
                'cob_comproban' => $this-> cob_comproban,
                'cob_serie' => $this-> cob_serie,
                'cob_numero' => $this-> cob_numero,
                'con_subtotal' => $this-> con_subtotal,
                'cob_igv' => $this-> cob_igv,
                'cob_total' => $this-> cob_total,
             ]);
 
             $this->resetInput();
             $this->updateMode = false;
             $this->emit('closeModal');
             $this->emit('msgEDIT','Cobro Actualizado Correctamente');  
         }
         
     }
         //desactivar
    public function anular($id)
    {
        $record=Cobros::find($id);
        $record->update([
            'cob_estado'=>'Anulado'
        ]);
        $this->emit('msgINFO','Cobro Anulado');   
    }
}

