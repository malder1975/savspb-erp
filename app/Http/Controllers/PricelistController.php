<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricelist = Pricelist::where(['PR_LIST.FDEL', '<>', 1])->
            join('KLIENT', 'PR_LIST.KLIENT_ID', '=', 'KLIENT.KLIENT_ID')->
            select('PR_LIST.*', 'KLIENT.KLIENT_ID', 'KLIENT.NAME')->
            selectRaw('PR_LIST_ID, KLIENT.KLIENT_ID AS KLIENT_ID, ART, NAME, PRICE1 AS PRICE_IN, PRICE2, PRICE3, NOTE, USERID, DATA_MODYFY, FDEL, UNIT, S_ASSEMBLING, S_DISMANTLING, TARIFF_ASM_ID,
            S_ASM, S_DASM, TARIFF_WARP_ID, S_WARP, R_LENGTH, R_DEPTH, R_HEIGHT, TYPE_SIZE, FULL_LENGTH, FULL_WIDTH, FASM_HAND, CONFIG, FLIKV, MATR_CLASS_ID')->get();

        return response()->json($pricelist, 200);
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
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function show(Pricelist $pricelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricelist $pricelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricelist $pricelist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricelist $pricelist)
    {
        //
    }
}
