<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Mesa;
use Livewire\WithPagination;
//para fecha y hora
use Carbon\Carbon;

class ClienteController extends Component
{
    //paginado para la tabla y el tema es bootstrap     
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //creacion de variables 
    public $clien_nombres,$clien_direcc;
    //Que id es para las acciones
    public $selected_id;
    public $updateMode = false;
    //configuraciones para la tabla
    public $Campo ='clien_id';
    public $OrderBy='desc';
    public $pagination=5;
    public $buscar='';   

    public function render()
    {       
        $info=Cliente::query()
        ->search($this->buscar)
        ->orderBy($this->Campo,$this->OrderBy)
        ->paginate($this->pagination);
        
        return view('livewire.cliente.listar',[
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
		$this->clien_nombres = null;
		$this->clien_direcc = null;
    }

     //metodo para registrar
     public function store()
     { 
         $this->validate([
         'clien_nombres' => 'required',
         'clien_direcc' => 'required',      
         ]);
 
         Cliente::create([ 
             'clien_nombres' => $this-> clien_nombres,
             'clien_direcc' => $this-> clien_direcc,
         ]);
         
         $this->resetInput();
         $this->emit('closeModal');
         $this->emit('msgOK','Cliente Registrado Correctamente');       
     }
     
    //editar
    public function edit($id)
    {
        $record = Cliente::findOrFail($id);

        $this->selected_id = $id; 
		$this->clien_nombres = $record-> clien_nombres;
		$this->clien_direcc = $record-> clien_direcc;
		
        $this->updateMode = true;
    }

    //actualizar
    public function update()
    {
        $this->validate([
            'clien_nombres' => 'required',
            'clien_direcc' => 'required',     
            ]);

        if ($this->selected_id) {
			$record = Cliente::find($this->selected_id);
            $record->update([ 
			'clien_nombres' => $this-> clien_nombres,
			'clien_direcc' => $this-> clien_direcc,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
            $this->emit('msgEDIT','Cliente Actualizado Correctamente');  
        }
    }
}
