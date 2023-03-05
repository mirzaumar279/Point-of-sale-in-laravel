<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(vendor $vendor,$id)
    {
        return view('vendordetail')->with('vendorArr', vendor::find($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendoradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new vendor();
        $res->vname = $request->input('name');
        $res->vemail = $request->input('email');
        $res->vaddress = $request->input('address');
        $res->vphone = $request->input('phone');
        $res->company = $request->input('company');
        $res->save();
        return redirect('vendorview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor, Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $vendorArr = vendor::where('vname', 'LIKE', "%$search%")->get();
        } else {
            $vendorArr = vendor::orderBy('id','desc')->get()->all();
        }
        $data = compact('vendorArr', 'search');
        return view('vendorview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor, $id)
    {
        return view('vendoredit')->with('vendorArr', vendor::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor, $id)
    {
        $res = vendor::find($request->id);
        $res->vname = $request->input('name');
        $res->vemail = $request->input('email');
        $res->vphone = $request->input('phone');
        $res->vaddress = $request->input('address');
        $res->company = $request->input('company');
        $res->save();
        $request->session()->flash('update','Updated! Data has been updated successfully');
        return redirect('vendorview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor, $id)
    {
        vendor::destroy(['id', $id]);
        $request->session()->flash('msggg','Deleted! Data has been Deleted successfully');
        return redirect('vendorview');
    }
}
