<?php

namespace App\Http\Controllers\Api\PostPok;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*$suppliers = Suppliers::where(['KLIENT.POST' => 1, 'KLIENT.FDEL' => 0])->
       join('ORG', 'KLIENT.ORG_ID', '=', 'ORG.ORG_ID')->select('KLIENT.*', 'ORG.ORG_NAME')->
       orderBy('KLIENT.NAME', 'ASC')->get();*/
       $suppliers = Suppliers::where([['KLIENT.KLIENT_ID', '>', 1], ['KLIENT.FDEL', '=', 0]])->
       join('ORG', 'KLIENT.ORG_ID', '=', 'ORG.ORG_ID')->select('KLIENT.*', 'ORG.ORG_NAME')->
       orderBy('KLIENT.NAME', 'ASC')->get();
          return response()->json($suppliers, 200);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Suppliers::findOrFail($id);
        return response()->json($supplier, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Suppliers::find($id)->update($request->all());
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete = Suppliers::find($id);
       $delete->FDEL = 1;
       Suppliers::save();
    }
}
