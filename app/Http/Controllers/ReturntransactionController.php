<?php

namespace App\Http\Controllers;

use App\Models\returntransaction;
use Illuminate\Http\Request;
use App\Models\returnhistory;
use DB;
class ReturntransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(returntransaction $returntransaction,$id)
    {
        return view('returntransactionprint')->with('returntransactionArr', returntransaction::find($id));
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
     * @param  \App\Models\returntransaction  $returntransaction
     * @return \Illuminate\Http\Response
     */
    public function show(returntransaction $returntransaction)
    {
        $sum=DB::table('returntransactions')->sum('rtamount');
        $order = returntransaction::get();
        return view('returntransactionview',compact('sum'), ['returntransactionArr' => $order,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\returntransaction  $returntransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(returntransaction $returntransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\returntransaction  $returntransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returntransaction $returntransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\returntransaction  $returntransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(returntransaction $returntransaction)
    {
        //
    }
}
