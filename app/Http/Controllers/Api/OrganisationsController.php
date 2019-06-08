<?php

namespace App\Http\Controllers;

use App\Models\Organisations;
use Illuminate\Http\Request;

class OrganisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations = Organisations::all();
        return response()->json($organisations, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisations  $organisations
     * @return \Illuminate\Http\Response
     */
    public function show(Organisations $organisations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisations  $organisations
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisations $organisations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisations  $organisations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisations $organisations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisations  $organisations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisations $organisations)
    {
        //
    }
}
