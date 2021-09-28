<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa;
use Livewire\WithPagination;

class MesaController extends Component
{
    //paginado para la tabla y el tema es bootstrap
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //creacion de variables
    public $mes_numero,$mes_sillas;
    //Que id es para las acciones
    public $selected_id;
    public $updateMode = false;
    //configuraciones para la tabla
    public $Campo ='mes_id';
    public $OrderBy='desc';
    public $pagination=5;
    public $buscar='';


    public function render()
    {
        $info=Mesa::query()
        ->search($this->buscar)
        ->orderBy($this->Campo,$this->OrderBy)
        ->paginate($this->pagination);

        return view('livewire.mesa.listar',[
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
		$this->mes_numero = null;
		$this->mes_sillas = null;
    }

     //metodo para registrar
     public function store()
     {
         $this->validate([
         'mes_numero' => 'required',
         'mes_sillas' => 'required',
         ]);

         Mesa::create([
             'mes_numero' => $this-> mes_numero,
             'mes_sillas' => $this-> mes_sillas,
         ]);

         $this->resetInput();
         $this->emit('closeModal');
         $this->emit('msgOK','Mesa Registrada Correctamente');
     }

    //editar
    public function edit($id)
    {
        $record = Mesa::findOrFail($id);

        $this->selected_id = $id;
		$this->mes_numero = $record-> mes_numero;
		$this->mes_sillas = $record-> mes_sillas;

        $this->updateMode = true;
    }

    //actualizar
    public function update()
    {
        $this->validate([
            'mes_numero' => 'required',
            'mes_sillas' => 'required',
            ]);

        if ($this->selected_id) {
			$record = Mesa::find($this->selected_id);
            $record->update([
			'mes_numero' => $this-> mes_numero,
			'mes_sillas' => $this-> mes_sillas,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
            $this->emit('msgEDIT','Mesa Actualizada Correctamente');
        }
    }

    //desactivar
    public function disable($id)
    {
        $record=Mesa::find($id);
        $record->update([
            'mes_estado'=>'Desactivado'
        ]);
        $this->emit('msgINFO','Mesa Desactivada Correctamente');
    }

    public function ReporteMesas()
    {
        $this->emit('pdf_mesa');
    }
}
