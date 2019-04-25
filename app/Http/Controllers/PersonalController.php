<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function signup(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'pass' => 'required',
            'email' => 'required|email"unique:personal'
        ]);

        $user = new Personal([
            'login' => $request->input('login'),
            'pass' => $request->input('pass'),
            'email' => bcrypt($request->input('email'))
        ]);

        $user->save();

        return response()->json([
            'message' => 'Пользователь успешно создан'
        ], 201);
    }

    public function get(Request $request)
    {
        $personal_id = $request->get("PERSONAL_ID", 0);
        $person = Personal::find($personal_id);
        return $person;
    }

    public function getPersonals(Request $request)
    {
       $persons = Personal::all();
       $response = [
           'persons' => $persons
       ];
       return response()->json($response, 201);
    }

    public function putPerson(Request $request, $id)
    {
        $person = Personal::find($id);
            if (!$person) {
                return response()->json(['message' => 'Пользователь не найден!'], 404);
            }
            $person->login = $request->input('login');
            $person->email = $request->input('email');
            $person->pass = $request->input('pass');
            $person->save();
            return request()->json(['person' => $person], 200);
    }
}
