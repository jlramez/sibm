<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banco;

class Cuenta extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'cuentas';

    protected $fillable = ['bancos_id','descripcion'];
    public function bancos()
    {

        return $this->HasOne(Banco::class,'id','bancos_id');

    }
	
}
