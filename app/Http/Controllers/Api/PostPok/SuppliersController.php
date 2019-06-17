<?php

namespace App\Http\Controllers\Api\PostPok;

use App\Models\Merchandises;
use App\Models\Organisations;
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
        join('ORG', 'KLIENT.ORG_ID', '=', 'ORG.ORG_ID')->
        join('FSALER', 'KLIENT.FSALER_ID', '=', 'FSALER.FSALER_ID')->
        select('KLIENT.*', 'ORG.ORG_NAME')->
        orderBy('KLIENT.NAME', 'ASC')->selectRaw('KLIENT_ID, KLIENT_KOD, NAME, ORG.ORG_ID AS ORG_ID, ORG.ORG_NAME,
                                                 GRAPH, FSALER.FSALER_ID AS FSALER_ID, FSALER.FSALER_NAME,
                                                 KL_CITY, KL_ADR, KL_REPRESENT, KL_TEL, KL_FAX, KL_EMAIL,
                                                 KL_BANK, KL_KS, KL_RS, KL_BIK, KL_INN, KL_KPP, KL_OKPO,
                                                 KL_OKONH, KL_NOTE, PREMIUM')->get();*/
        $suppliers = Suppliers::where([['KLIENT.KLIENT_ID', '>', 1], ['KLIENT.FDEL', '=', 0]])->
        join('ORG', 'KLIENT.ORG_ID', '=', 'ORG.ORG_ID')->
        join('FSALER', 'KLIENT.FSALER_ID', '=', 'FSALER.FSALER_ID')->
        select('KLIENT.*', 'ORG.ORG_NAME', 'FSALER.FSALER_NAME')->
        orderBy('KLIENT.NAME', 'ASC')->selectRaw('KLIENT_KOD, NAME, ORG.ORG_ID AS ORG_ID, ORG.ORG_NAME,
                                                 GRAPH, FSALER.FSALER_ID AS FSALER_ID, FSALER.FSALER_NAME,
                                                 KL_CITY, KL_ADR, KL_REPRESENT, KL_TEL, KL_FAX, KL_EMAIL,
                                                 KL_BANK, KL_KS, KL_RS, KL_BIK, KL_INN, KL_KPP, KL_OKPO,
                                                 KL_OKONH, KL_NOTE, PREMIUM')->get();
//        $suppliers = Suppliers::getSuppliers();*/
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

       // $dolg_realiz = \DB::statement('call get_dolg_realiz(?)', [$id]);
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
        return Suppliers::find($id);
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
        return Suppliers::find($id)->update($request->all());
        //return response()->json($edit);
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

    public function organisations()
    {
        return response()->json(Organisations::where('FDEL', 0)->get());
    }

    public function merchandises()
    {
        return response()->json(Merchandises::where('FDEL', 0)->get());
    }
}
