<?php

namespace App\Http\Controllers;

use App\Models\returnproduct;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\transaction;
use App\Models\returnhistory;
use App\Models\product;
use App\Models\returntransaction;
use App\Models\inventory;
use DB;
class ReturnproductController extends Controller
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
        $inventory = inventory::get();
        
        return view('returnadd', compact('inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = inventory::findOrFail($request->inventory_id);

        $res = new returnproduct();
        $res->rproduct = $inventory->inproduct;
        $res->rquantity = $request->input('quantity');
        $res->rprice = $inventory->sale;
        $res->rvandor = $inventory->vname;
        $res->rtotal = $res->oquantity * $inventory->sale;
        $inventory->increment('inquantity', $res->rquantity);
        $res->save();

        $inventory = new inventory();
        $inventory->inproduct = $res->rproduct;
        $inventory->inquantity = $res->rquantity;
        $inventory->inprice = "Return";
        $inventory->sale = $res->rprice;
        $inventory->vname = $res->rvandor;
        $inventory->type = "2";
        $inventory->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('returnview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\returnproduct  $returnproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $returnproduct = returnproduct::get();
        return view('returnview', ['returnArr' => $returnproduct]);


        

        // $order = history::get();
       
        // return view('returnview', ['HistoryArr' => $order, 'transactions' => $transactions, "search" ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\returnproduct  $returnproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(returnproduct $returnproduct, $id)
    {
        return view('returnedit')->with('HistoryArr', history::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\returnproduct  $returnproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returnproduct $returnproduct, $id)
    {
       
        // $product = product::findOrFail($request->product_id);

        $res = history::find($request->id);
        $res->hquantity = $request->input('quantity');
        $res->status = $request->input('status');
        $res->save();
        DB::table('products')->where('id',13)->increment('Pstock', $res->hquantity);
        // $product->increment('Pstock', $res->hquantity);
        
        $request->session()->flash('msggg','Updated! Data has been updated successfully');
        return redirect('returnview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\returnproduct  $returnproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,returnproduct $returnproduct, $id)
    {
        returnproduct::destroy(['id', $id]);
        $request->session()->flash('msgggg','Deleted! Data has been Deleted successfully');
        return redirect('returnview');
    }


    public function delete(returnproduct $returnproduct)
    {
        $returnproduct = returnproduct::get();
        returnproduct::destroy($returnproduct);
        return redirect('returnview');
    }


    public function transactionstore(Request $request)
    {
        $res = new returntransaction();
        $res->rdate = now();
        $res->rmethod = 'CASH';
        $res->rtamount = $request->input('total');
        $res->rtpaid = $request->input('payment');
        $res->rtbalance = $request->input('change');
        $res->save();

        $returnproduct = returnproduct::get(); 
        foreach($returnproduct as $returnproducts)
        {
            $rhist = new returnhistory();
        
            $rhist->returntransaction_id = $res->id; 
            $rhist->rhproduct = $returnproducts->rproduct;
            $rhist->rhquantity = $returnproducts->rquantity;
            $rhist->rhprice = $returnproducts->rprice;
            $rhist->rhtotal = $rhist->rhquantity * $rhist->rhprice;
            $rhist->save();
        }
        return redirect('returnview');
    }
}
