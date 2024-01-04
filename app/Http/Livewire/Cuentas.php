<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cuenta;
use App\Models\Banco;

class Cuentas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $bancos_id, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cuentas.view', [
            'bancos' => Banco::all(),
            'cuentas' => Cuenta::latest()
						->orWhere('bancos_id', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->bancos_id = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
            'bancos_id' => 'required',
        ]);

        Cuenta::create([ 
			'bancos_id' => $this-> bancos_id,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Cuenta Successfully created.');
    }

    public function edit($id)
    {
        $record = Cuenta::findOrFail($id);
        $this->selected_id = $id; 
		$this->bancos_id = $record-> bancos_id;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
            'descripcion' => 'required',
            'bancos_id' => 'required',
        ]);
        if ($this->selected_id) {
			$record = Cuenta::find($this->selected_id);
            $record->update([ 
			'bancos_id' => $this-> bancos_id,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Cuenta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Cuenta::where('id', $id)->delete();
        }
    }
}