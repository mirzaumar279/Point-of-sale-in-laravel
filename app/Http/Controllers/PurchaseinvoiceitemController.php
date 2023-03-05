<?php

namespace App\Http\Controllers;

use App\Models\purchaseinvoiceitem;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\vendor;
use App\Models\assigned;
use DB;
class PurchaseinvoiceitemController extends Controller
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
        // $product = assigned::select('vname')->distinct()->get();
        $product = assigned::get();
        $vendor = vendor::get();
        return view('purchaseinvoiceitemadd', compact('product',"vendor"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = assigned::findOrFail($request->product_id);
        $res = new purchaseinvoiceitem();
        $res->item_id = $product->id;
        $res->itemname= $product->productname;
        $res->vendorname= $product->vname;
        $res->tquantity = $product->quantity;
        $res->rquantiy = $request->input('rquantity');
        $res->costunit = $request->input('cost');
        $res->total= $res->rquantiy*$res->costunit;
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('purchaseinvoiceitemview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchaseinvoiceitem  $purchaseinvoiceitem
     * @return \Illuminate\Http\Response
     */
    public function show(purchaseinvoiceitem $purchaseinvoiceitem, Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $iteminvoiceArr = purchaseinvoiceitem::where('itemname', 'LIKE', "%$search%")->get();
        } else {
            $iteminvoiceArr = purchaseinvoiceitem::get()->all();
        }
        
        $data = compact('iteminvoiceArr', 'search');
        return view('purchaseinvoiceitemview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchaseinvoiceitem  $purchaseinvoiceitem
     * @return \Illuminate\Http\Response
     */
    public function edit(purchaseinvoiceitem $purchaseinvoiceitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchaseinvoiceitem  $purchaseinvoiceitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchaseinvoiceitem $purchaseinvoiceitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchaseinvoiceitem  $purchaseinvoiceitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchaseinvoiceitem $purchaseinvoiceitem, Request $request, $id)
    {
        purchaseinvoiceitem::destroy(['id', $id]);
        $request->session()->flash('msgggg','Deleted! Data has been Deleted successfully');
        return redirect('purchaseinvoiceitemview');
    }
}
