<?php

namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        return Personal::all();

       /* return response()->json([
            'status' => 'success',
            'users' => $users->toArray()
        ], 200);*/
    }

    public function show(Request $request, $id)
    {
        return Personal::findOrFail($id);

        /*return response()->json([
            'status' => 'success',
            'user' => $user->toArray()
        ], 200);*/


    }

    public function update(Request $request, $id)
    {
        $person = Personal::findOrFail($id);
        $person->update($request->all());

        return $person;
    }

    public function store(Request $request)
    {
        $person = Personal::create($request->all());
        return $person;
    }

    public function destroy($id)
    {
        $person = Personal::findOrFail($id);
        $person->delete();
        return '';
    }
}
