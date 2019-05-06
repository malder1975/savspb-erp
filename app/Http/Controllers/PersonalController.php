<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::all();

        return response()->json([
            'status' => 'Success',
            'personal' => $personal->toArray()
        ], 200);
    }

    public function show(Request $request, $id)
    {
        $person = Personal::find($id);

        return response()->json([
            'status' => 'Success',
            'person' => $person->toArray()
        ], 200);
    }
}
