<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\vendor;
use App\Models\order;
use App\Models\transaction;
use App\Models\returntransaction;
use App\Models\returnhistory;
use App\Models\purchaseinvoiceitem;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = purchaseinvoiceitem::get();
        $vendor = vendor::get();
        return view('inventoryadd', compact('product',"vendor"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new inventory();
        $res->inproduct= $request->input('productname');
        $res->inprice= $request->input('costunit');
        $res->sale = $request->input('sale');
        $res->inquantity= $request->input('rquantiy');
        $res->vname= 'Added product through that ID ' .$request->input('vendorname');
        $res->type = "1";
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('inventoryview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $inventoryArr = inventory::where('inproduct', 'LIKE', "%$search%")->get();
        } else {
            $inventoryArr = inventory::get()->all();
        }
        
        $data = compact('inventoryArr', 'search');
        return view('inventoryview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventory $inventory)
    {
        //
    }
}
