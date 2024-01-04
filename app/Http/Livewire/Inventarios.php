<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inventario;
use App\Models\Clave;
use App\Models\Banco;
use App\Models\Empleado;
use App\Models\Fuente;
use App\Models\Cuenta;

class Inventarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $almacen, $claves_id, $fuentes_id, $bancos_id, $empleados_id, $costo, $cantidad, $noinv, $cuentas_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inventarios.view', [
			'cuentas' => Cuenta:: all(),
			'claves' => Clave::all(),
			'bancos' => Banco::orderby('descripcion', 'ASC')->get(),
			'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
			'fuentes' => Fuente::all(),
            'inventarios' => Inventario::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('almacen', 'LIKE', $keyWord)
						->orWhere('claves_id', 'LIKE', $keyWord)
						->orWhere('fuentes_id', 'LIKE', $keyWord)
						->orWhere('bancos_id', 'LIKE', $keyWord)
						->orWhere('empleados_id', 'LIKE', $keyWord)
						->orWhere('costo', 'LIKE', $keyWord)
						->orWhere('cantidad', 'LIKE', $keyWord)
						->orWhere('cuentas_id', 'LIKE', $keyWord)
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
		$this->almacen = null;
		$this->claves_id = null;
		$this->fuentes_id = null;
		//$this->bancos_id = null;
		$this->empleados_id = null;
		$this->costo = null;
		$this->cantidad = null;
		$this->noinv = null;
		$this->cuentas_id = null;
    }

    public function store()
    {
		$this->validate([
			'descripcion' => 'required',
			'almacen' => 'required',
			'claves_id' => 'required',
			'fuentes_id' => 'required',
			//'bancos_id' => 'required',
			'empleados_id' => 'required',
			'costo' => 'required',
			'cantidad' => 'required',
			'noinv' => 'required',
			'cuentas_id' => 'required',
			
			]);

        Inventario::create([ 
			'descripcion' => $this-> descripcion,
			'almacen' => $this-> almacen,
			'claves_id' => $this-> claves_id,
			'fuentes_id' => $this-> fuentes_id,
			//'bancos_id' => $this-> bancos_id,
			'empleados_id' => $this-> empleados_id,
			'costo' => $this-> costo,
			'cantidad' => $this-> cantidad,
			'noinv' => $this-> noinv,
			'cuentas_id' => $this->cuentas_id,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Inventario Successfully created.');
    }

    public function edit($id)
    {
        $record = Inventario::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->almacen = $record-> almacen;
		$this->claves_id = $record-> claves_id;
		$this->fuentes_id = $record-> fuentes_id;
		//$this->bancos_id = $record-> bancos_id;
		$this->empleados_id = $record-> empleados_id;
		$this->costo = $record-> costo;
		$this->cantidad = $record-> cantidad;
		$this->noinv = $record-> noinv;
		$this->cuentas_id= $record -> cuentas_id;
    }

    public function update()
    {
		$this->validate([
			'descripcion' => 'required',
			'almacen' => 'required',
			'claves_id' => 'required',
			'fuentes_id' => 'required',
			//'bancos_id' => 'required',
			'empleados_id' => 'required',
			'costo' => 'required',
			'cantidad' => 'required',
			'noinv' => 'required',
			'cuentas_id' => 'required',
			
			]);
			
        if ($this->selected_id) {
			$record = Inventario::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion,
			'almacen' => $this-> almacen,
			'claves_id' => $this-> claves_id,
			'fuentes_id' => $this-> fuentes_id,
		//	'bancos_id' => $this-> bancos_id,
			'empleados_id' => $this-> empleados_id,
			'costo' => $this-> costo,
			'cantidad' => $this-> cantidad,
			'noinv' => $this->noinv,
			'cuentas_id' => $this->cuentas_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Inventario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Inventario::where('id', $id)->delete();
        }
    }
}