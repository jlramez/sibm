<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clave;
use App\Models\Banco;
use App\Models\Empleado;
use App\Models\Fuente;
use App\Models\Cuenta;

class Inventario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'inventarios';

    protected $fillable = ['cuentas_id', 'descripcion','almacen','claves_id','fuentes_id','bancos_id','empleados_id','costo','cantidad', 'noinv'];
    public function empleados()
    {

        return $this->HasOne(Empleado::class,'id','empleados_id');

    }
    public function bancos()
    {

        return $this->HasOne(Banco::class,'id','bancos_id');

    }
    public function claves()
    {

        return $this->HasOne(Clave::class,'id','claves_id');

    }
    public function fuentes()
    {

        return $this->HasOne(Fuente::class,'id','fuentes_id');

    }
    public function cuentas()
    {

        return $this->HasOne(Cuenta::class,'id','cuentas_id');

    }
	
}
