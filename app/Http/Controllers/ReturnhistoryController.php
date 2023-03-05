<?php

namespace App\Http\Controllers;

use App\Models\returnhistory;
use Illuminate\Http\Request;
use App\Models\returntransaction;
use App\Models\returnproduct;
use App\Models\User;
use DB;
class ReturnhistoryController extends Controller
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
     * @param  \App\Models\returnhistory  $returnhistory
     * @return \Illuminate\Http\Response
     */
    public function show(returnhistory $returnhistory)
    {
        $user=User::get();
        $returntransactions = returntransaction::with('returnhistory')->get();
        return view('returnhistoryview',compact('user'), ['returntransactions' => $returntransactions ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\returnhistory  $returnhistory
     * @return \Illuminate\Http\Response
     */
    public function edit(returnhistory $returnhistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\returnhistory  $returnhistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returnhistory $returnhistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\returnhistory  $returnhistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(returnhistory $returnhistory)
    {
        //
    }
}
