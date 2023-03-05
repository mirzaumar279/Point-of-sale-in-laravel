<?php

namespace App\Http\Controllers;

use App\Models\purchaseinvoice;
use Illuminate\Http\Request;
use App\Models\vendor;
class PurchaseinvoiceController extends Controller
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
        
        $vendor = vendor::get();
        return view('purchaseinvoiceadd', compact("vendor"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = vendor::findOrFail($request->vendor_id);
        $res = new purchaseinvoice();
        $res->vendor_id = $vendor->id;
        $res->vendorname = $vendor->vname;
        $res->invoicenumber = $request->input('invoicenum');
        $res->Status= $request->input('status');
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('purchaseinvoiceview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchaseinvoice  $purchaseinvoice
     * @return \Illuminate\Http\Response
     */
    public function show(purchaseinvoice $purchaseinvoice, Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $purchaseinvoiceArr = purchaseinvoice::where('vendorname', 'LIKE', "%$search%")->get();
        } else {
            $purchaseinvoiceArr = purchaseinvoice::get()->all();
        }
        
        $data = compact('purchaseinvoiceArr', 'search');
        return view('purchaseinvoiceview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchaseinvoice  $purchaseinvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(purchaseinvoice $purchaseinvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchaseinvoice  $purchaseinvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchaseinvoice $purchaseinvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchaseinvoice  $purchaseinvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchaseinvoice $purchaseinvoice, Request $request, $id)
    {
        purchaseinvoice::destroy(['id', $id]);
        $request->session()->flash('msgggg','Deleted! Data has been Deleted successfully');
        return redirect('purchaseinvoiceview');
    }
}
