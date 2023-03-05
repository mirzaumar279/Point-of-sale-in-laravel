<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\transaction;
use App\Models\history;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\inventory;
use Illuminate\Validation\ValidationException;
use App\Models\returnproduct;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->input('change');
        return redirect('orderview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $inventory= inventory::select('inproduct')->distinct()->get();
        $inventory = inventory::get();
        return view('orderadd', compact('inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $inventory = product::get();
        $inventory = inventory::findOrFail($request->inventory_id);
       
        if ($inventory->inquantity === 0)
        {
            throw ValidationException::withMessages([ 'product' => 'Error! Sorry this product is unavailable' ]);
            
        }
        
        
        $res = new order();
        $res->oproduct = $inventory->inproduct;
        $res->oquantity = $request->input('quantity');
        if ($inventory->inquantity < $res->oquantity)
        {
            throw ValidationException::withMessages([ 'product' => 'Error! Sorry we have not much this product' ]);
            
        }
        $res->oprice = $inventory->sale;
        $res->ovandor = $inventory->vname;
        $res->ototal = $res->oquantity * $inventory->sale;
        $inventory->decrement('inquantity', $res->oquantity);
        $res->save();

        $inventory = new inventory();
        $inventory->inproduct = $res->oproduct;
        $inventory->inquantity = $res->oquantity;
        $inventory->inprice = "Sold";
        $inventory->sale = $res->oprice;
        $inventory->vname = $res->ovandor;
        $inventory->type = "0";
        $inventory->save();
        
        $request->session()->flash('msg','Success! Data has been Added successfully');

        
        return redirect('orderview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
   
        $order = order::get();
        
        return view('orderview', ['orderArr' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order, $id)
    {
        $product = product::get();
        return view('orderedit', compact('product'))->with('orderArr', order::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order, $id)
    {
        $res = order::find($request->id);
        $res->oproduct = $request->input('name');
        $res->oquantity = $request->input('quantity');
        $res->oprice = $request->input('price');
        $res->save();
        $request->session()->flash('msgg','Updated! Data has been Updated successfully');
        return redirect('orderview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, order $order, $id)
    {
        
        order::destroy(['id', $id]);
        $request->session()->flash('msgggg','Deleted! Data has been Deleted successfully');
        return redirect('orderview');
    }
    public function delete(order $order)
    {
        $order = order::get();
        order::destroy($order);
        return redirect('orderview');
    }
    
    public function transactionstore(Request $request)
    {
        $res = new transaction();
        $res->date = now();
        $res->method = 'CASH';
        $res->tamount = $request->input('total');
        $res->tpaid = $request->input('payment');
        $res->tbalance = $request->input('change');
        $res->save();

        $orders = order::get(); 
        foreach($orders as $order)
        {
            $hist = new history();
        
            $hist->transaction_id = $res->id; 
            $hist->hproduct = $order->oproduct;
            $hist->hquantity = $order->oquantity;
            $hist->hprice = $order->oprice;
            $hist->htotal = $hist->hquantity * $hist->hprice;
            $hist->save();
        }
        return redirect('orderview');
    }
    
}
