<?php

namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class PersonController extends Controller
{
    public function index()
    {
        $person = JWTAuth::toUser();
        return response()->json($person);
    }
}
