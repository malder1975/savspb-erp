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
      //
        $suppliers = Suppliers::getSuppliers();
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

        $dolg_realiz = \DB::statement('call get_dolg_realiz(?)', [$id]);
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
