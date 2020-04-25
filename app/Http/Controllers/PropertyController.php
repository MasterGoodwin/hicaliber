<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->except('_token');
        $property = Property::filter($params)->get();
        return response()->json($property);
    }
}
