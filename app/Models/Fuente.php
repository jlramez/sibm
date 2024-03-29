<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'fuentes';

    protected $fillable = ['descripcion'];
	
}
