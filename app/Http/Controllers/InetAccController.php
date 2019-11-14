<?php

namespace App\Http\Controllers;

use App\Models\InetAcc;
use Illuminate\Http\Request;

class InetAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inetaccounts = InetAcc::
            join('ORG', 'ACCPREDOPL1.ORG_ID', '=', 'ORG.ORG_ID')->
            select('ACCPREDOPL1.*', 'ORG.ORG_NAME')->

            orderby('ACCPREDOPL1.NUM', 'ASC')->selectRaw('ACCPREDOPL1_ID, NUM, DAT, BUYER_NAME, FSTATE, ORG.ORG_ID AS ORG_ID,
                    ORG.ORG_NAME, ORG.ORG_ADDRESS, ORG.ORG_INN, ORG.ORG_KPP, ORG.OKPO, ORG.OKONH, ORG.BANK,
                    ORG.R_ACC, ORG.K_ACC, ORG.BIK, ORG.GLAVBUH, ORG.GENDIR, ORG.NDSPROC, S_US1, S_US2, S_US3,
                    S_DELIV, S_ASSEMB, S_WRAP, S_GOOD, S_OPL, EMAIL')->
            get();

        return response()->json($inetaccounts, 200);
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
     * @param  \App\Models\InetAcc  $inetAcc
     * @return \Illuminate\Http\Response
     */
    public function show(InetAcc $inetAcc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InetAcc  $inetAcc
     * @return \Illuminate\Http\Response
     */
    public function edit(InetAcc $inetAcc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InetAcc  $inetAcc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InetAcc $inetAcc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InetAcc  $inetAcc
     * @return \Illuminate\Http\Response
     */
    public function destroy(InetAcc $inetAcc)
    {
        //
    }

    public function accSummTotal()
    {
        $sum_total = InetAcc::selectRaw('sum(S_OPL) as SUM_TOTAL')->get();

        return response()->json($sum_total, 200);
    }
}
