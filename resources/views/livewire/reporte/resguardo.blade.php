<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ public_path('js/app.js') }}"></script> 
    @vite(['resources/js/app.js'])
    <title>Lista de Notificaciones</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="card">
                        <div>
                             <h3 align="center"> TRIBUNAL DE JUSTICIA LABORAL BUROCRÁTICA DEL ESTADO DE ZACATECAS</h3>
                        </div>
                    <div class="card-header">
                         <h5 align="center">VALE ÚNICO DE RESGUARDO DE BIENES MUEBLES </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <div class="table  mt-4" style="max-width: 100%;">
                            <table class="table" >
                                    <thead class="thead">
                                        <tr><td><strong>UNIDAD RESPONSABLE:</strong> {{mb_strtoupper($empleado->departamento ?? '')}}</td><td><strong>FECHA:</strong> {{$fecha}}</td></tr>
                                        <tr><td><strong>PUESTO:</strong> {{mb_strtoupper($empleado->puesto ?? '')}}</td><td></td></tr>
                                        <tr><td><strong>NOMBRE:</strong> {{mb_strtoupper($empleado->nombre ?? '')}}</td><td></td></tr>
                                        <tr><td colspan="2">&nbsp;</td>
                                        <tr><td colspan="2">&nbsp;</td>
                                        <tr><td><strong>FIRMA DEL RESPONSABLE:</strong>_________________________________________</td><td></td></tr>
                                        
                                        <tr><td colspan="2">&nbsp;</td>
                                        <tr><td colspan="2">&nbsp;</td>
                                        <tr align="center"> 
                                            <th style="max-width: 10%; text-align: center">NO. DE INVENTARIO</th>						
                                            <th style="max-width: 40%; text-align: center">ARTICULO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            @forelse($articulos as $row)
                                            <tr align="center">						
                                                <td align="center" ><strong> {{ $row->noinv ?? '' }}</strong></td>
                                                <td align="center">{{mb_strtoupper( $row->descripcion ?? '') }} </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="100%">No tiene artículos asignados  </td>
                                            </tr>
                                            @endforelse
                                            <tr><td colspan="2">&nbsp;</td>
                                                <tr><td colspan="2">&nbsp;</td>
                                                    <tr><td colspan="2">&nbsp;</td>
                                                        <tr><td colspan="2">&nbsp;</td>
                                            <tr align="center">
                                             
                                            <td align="center" colspan="2"><strong> COORDINADORA ADMINISTRATIVA</strong></td>
                                            
                                            </tr>
                                            <tr align="center">
                                            <td align="center" colspan="2"><strong> LE. DULCE CAROLINA GONZALEZ LARA</strong></td>
                                            </tr>
                                        </tbody>
                                    <tfoot>
                                         <tr><td>{{ $articulos->links() }}
                                            </td>
                                        </tr>
                                    </tfoot>
                            </table>
                    </div>						
                            
</body>
</html>