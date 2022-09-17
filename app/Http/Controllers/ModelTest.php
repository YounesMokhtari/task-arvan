<?php

namespace App\Http\Controllers;

use App\Models\ModelA;
use Illuminate\Http\Request;

class ModelTest extends Controller
{
    public function  __invoke(Request $request)
    {
        $request->validate([
            'user_star' => 'required|numeric'
        ]);
        ModelA::create($request->all());
    }
}
