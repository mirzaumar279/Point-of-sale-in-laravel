<?php

namespace App\Http\Controllers;

use App\Models\assigned;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\vendor;
class AssignedController extends Controller
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
        $product = product::get();
        $vendor = vendor::get();
        return view('assignedadd', compact('product',"vendor"));
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
        $product = product::findOrFail($request->product_id);
        $res = new assigned();
        $res->vendor_id = $vendor->id;
        $res->vname = $vendor->vname;
        $res->product_id = $product->id;
        $res->productname= $product->Pname;
        $res->quantity = $request->input('quantity');
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('assignedview');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function show(assigned $assigned, Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $assignedArr = assigned::where('vname', 'LIKE', "%$search%")->get();
        } else {
            $assignedArr = assigned::get()->all();
        }
        
        $data = compact('assignedArr', 'search');
        return view('assignedview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function edit(assigned $assigned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assigned $assigned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function destroy(assigned $assigned, Request $request, $id)
    {
        assigned::destroy(['id', $id]);
        $request->session()->flash('msgggg','Deleted! Data has been Deleted successfully');
        return redirect('assignedview');
    }
}
