<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;
use Livewire\WithPagination;
//para fecha y hora
use Carbon\Carbon;

class MenuController extends Component
{
    //paginado para la tabla y el tema es bootstrap     
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //creacion de variables 
    public $men_nomb,$men_descripcion,$men_fech;
    //Que id es para las acciones
    public $selected_id;
    public $updateMode = false;
    //configuraciones para la tabla
    public $Campo ='men_id';
    public $OrderBy='desc';
    public $pagination=5;
    public $buscar='';   

    public function render()
    {       
        $info=Menu::query()
        ->search($this->buscar)
        ->orderBy($this->Campo,$this->OrderBy)
        ->paginate($this->pagination);
        
        return view('livewire.menu.listar',[
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
		$this->men_nomb = null;
		$this->men_descripcion = null;
		$this->men_fech = null;
    }

     //metodo para registrar 
     public function store()
     { 
         $this->validate([
         'men_nomb' => 'required',
         'men_descripcion' => 'required',
         'men_fech' => 'required',        
         ]);
 
         Menu::create([ 
             'men_nomb' => $this-> men_nomb,
             'men_descripcion' => $this-> men_descripcion,
             'men_fech' => $this-> men_fech
         ]);
         
         $this->resetInput();
         $this->emit('closeModal');
         $this->emit('msgOK','Menu Registrado Correctamente');       
     }
     
    //editar 
    public function edit($id)
    {
        $record = Menu::findOrFail($id);

        $this->selected_id = $id; 
		$this->men_nomb = $record-> men_nomb;
		$this->men_descripcion = $record-> men_descripcion;
		$this->men_fech = $record-> men_fech;
		
        $this->updateMode = true;
    }

    //actualizar
    public function update()
    {
        $this->validate([
            'men_nomb' => 'required',
            'men_descripcion' => 'required',
            'men_fech' => 'required',        
            ]);

        if ($this->selected_id) {
			$record = Menu::find($this->selected_id);
            $record->update([ 
			'men_nomb' => $this-> men_nomb,
			'men_descripcion' => $this-> men_descripcion,
			'men_fech' => $this-> men_fech
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
            $this->emit('msgEDIT','Menu Actualizado Correctamente');  
        }
    }

    //Desactivar
    public function disable($id)
    {
        $record=Menu::find($id);
        $record->update([
            'men_estado'=>'Desactivado'
        ]);
        $this->emit('msgEDIT','Menu Desactivado Correctamente');   
    }
    
}
