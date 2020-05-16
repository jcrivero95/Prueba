<?php

namespace App\Http\Controllers;

use App\AmbitoImpuesto;
use Illuminate\Http\Request;

class AmbitoImpuestoController extends Controller
{
  
    public function index()
    {

        $rs = AmbitoImpuesto::query()->get();
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

    
    public function show(AmbitoImpuesto $ambitoImpuesto)
    {
        //
    }

   
    public function edit(AmbitoImpuesto $ambitoImpuesto)
    {
        //
    }

   
    public function update(Request $request, AmbitoImpuesto $ambitoImpuesto)
    {
        //
    }

    
    public function destroy(AmbitoImpuesto $ambitoImpuesto)
    {
        //
    }
}
