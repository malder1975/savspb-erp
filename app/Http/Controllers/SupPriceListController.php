<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Models\SupPriceList;
use Illuminate\Http\Request;

class SupPriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supprlist = SupPriceList::where(['SUP_PRLIST.DEL' => 0])->
            join('KLIENT', 'SUP_PRLIST.KLIENT_ID', '=', 'KLIENT.KLIENT_ID' )->
            select('SUP_PRLIST.*', 'KLIENT.KLIENT_KOD', 'KLIENT.NAME')->get();

        return response()->json($supprlist, 200);
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
     * @param  \App\Models\SupPriceList  $supPriceList
     * @return \Illuminate\Http\Response
     */
    public function show(SupPriceList $supPriceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupPriceList  $supPriceList
     * @return \Illuminate\Http\Response
     */
    public function edit(SupPriceList $supPriceList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupPriceList  $supPriceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return SupPriceList::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupPriceList  $supPriceList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SupPriceList::find($id);
        $delete->DEL=1;
        SupPriceList::save();
    }

    public function supplier()
    {
        return response()->json(Suppliers::where('FDEL', 0)->get());
    }
}
