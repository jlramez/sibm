<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clave extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'claves';

    protected $fillable = ['descripcion'];
	
}
