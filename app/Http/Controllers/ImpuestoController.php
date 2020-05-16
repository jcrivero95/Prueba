<?php

namespace App\Http\Controllers;

use App\Impuesto;
use App\CalculoImpuesto;
use App\AmbitoImpuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ImpuestoController extends Controller
{
   
    public function index()
    {
   
       $rs = DB::table('impuestos')
       ->join('calculos_impuestos','impuestos.calculos_impuestos_id', '=', 'calculos_impuestos.id')
       ->join('ambitos_impuestos','impuestos.ambitos_impuestos_id','=','ambitos_impuestos.id')
       ->select('impuestos.*','ambitos_impuestos.nombre_ambito','calculos_impuestos.nombre_calculo')
       ->get();

        return response()->json([
            'data' => $rs
        ], 200);
        
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'ambitos_impuestos_id' => 'required|integer',
            'calculos_impuestos_id' => 'required|integer',
            'importe' => 'required|numeric',
            'etiqueta' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
    }

        $impuesto = Impuesto::create([
            'nombre' => $request->get('nombre'),
            'ambitos_impuestos_id' => $request->get('ambitos_impuestos_id'),
            'calculos_impuestos_id' => $request->get('calculos_impuestos_id'),
            'importe' => $request->get('importe'),
            'etiqueta' => $request->get('etiqueta'),
        ]);

        return response()->json([
            'data' => $impuesto
        ], 200);

    }


    
    public function show(Impuesto $impuesto)
    {
        return $impuesto;
    }

    
    public function edit(Impuesto $impuesto)
    {
        //
    }

    
    public function update(Request $request, Impuesto $impuesto)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'ambitos_impuestos_id' => 'required|integer',
            'calculos_impuestos_id' => 'required|integer',
            'importe' => 'required|numeric',
            'etiqueta' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
    }

        $impuesto->update([
            'nombre' => $request->get('nombre'),
            'ambitos_impuestos_id' => $request->get('ambitos_impuestos_id'),
            'calculos_impuestos_id' => $request->get('calculos_impuestos_id'),
            'importe' => $request->get('importe'),
            'etiqueta' => $request->get('etiqueta'),
        ]);

        return response()->json([
            'message' => 'update!',
            'impuesto' => $impuesto
        ]);
    }

   
    public function destroy(Impuesto $impuesto)
    {
        $impuesto->delete();

        return response()->json([
            'message' => 'delete!',
           
        ]);
    }
}
