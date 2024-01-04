<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventario;
use App\Models\Empleado;
use PDF;
use Carbon\carbon;

  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $fecha=carbon::parse(now(),'America/Mexico_city')->isoFormat('DD MMMM YYYY');
       // $resultado=Asignaactuacione::where('fecha_actuacion', carbon::parse($date)->toDateString())->where('autorizado',1)->Latest()->paginate(150);
       $empleado= Empleado::find($id); 
       $articulos=Inventario::where('empleados_id',$id)->paginate(100);
        $pdf = Pdf::loadView('livewire.reporte.resguardo',['empleado' => $empleado, 'articulos' => $articulos,  'fecha'=>$fecha])->setPaper('letter', 'landscape')->setOptions(['defaultFont' => 'sans-serif']);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}