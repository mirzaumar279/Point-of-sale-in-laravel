<?php

namespace App\Http\Controllers;
use App\Models\inventory;
use App\Models\product;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product,$id)
    {
        return view('productdetail')->with('productArr', product::find($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new product();
        $res->Pname = $request->input('name');
        $res->Pdescription = $request->input('description');
        $res->Pprice = $request->input('price');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/productimage/', $filename);
            $res->Pimage = $filename;
        }
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
       
        return redirect('productview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $productArr = product::where('Pname', 'LIKE', "%$search%")->get();
        } else {
            $productArr = product::orderBy('id','desc')->get()->all();
        }
        $data = compact('productArr', 'search');
        return view('productview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,product $product, $id)
    {
        product::destroy(['id', $id]);
        $request->session()->flash('msggg','Deleted! Data has been Deleted successfully');
        return redirect('productview');
    }
}
