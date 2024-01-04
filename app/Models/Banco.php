<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'bancos';

    protected $fillable = ['descripcion'];
	
}