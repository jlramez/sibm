<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fuente;

class Fuentes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.fuentes.view', [
            'fuentes' => Fuente::latest()
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
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
        ]);

        Fuente::create([ 
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Fuente Successfully created.');
    }

    public function edit($id)
    {
        $record = Fuente::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
            'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Fuente::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Fuente Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Fuente::where('id', $id)->delete();
        }
    }
}