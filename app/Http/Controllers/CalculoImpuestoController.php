<?php

namespace App\Http\Controllers;

use App\CalculoImpuesto;
use Illuminate\Http\Request;

class CalculoImpuestoController extends Controller
{
  
    public function index()
    {
        $rs = CalculoImpuesto::query()->get();
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
        //
    }

   
    public function show(CalculoImpuesto $calculoImpuesto)
    {
        //
    }

    
    public function edit(CalculoImpuesto $calculoImpuesto)
    {
        //
    }

    
    public function update(Request $request, CalculoImpuesto $calculoImpuesto)
    {
        //
    }

   
    public function destroy(CalculoImpuesto $calculoImpuesto)
    {
        //
    }
}
