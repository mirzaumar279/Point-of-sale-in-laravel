<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\transaction;
use App\Models\returnproduct;
use App\Models\User;
class PrintController extends Controller
{
    public function show(order $order)
    {
        $order = order::get();
        $transaction = transaction::get();
        $user=User::get();
        return view('printview',compact('user'), ['printArr' => $order, 'transactionArr' => $transaction]);
    }
    public function returnprint(order $order)
    {
        $returnproduct = returnproduct::get();
        $transaction = transaction::get();
        $user=User::get();
        return view('returnprintview',compact('user'), ['returnprintArr' => $returnproduct, 'transactionArr' => $transaction]);
    }
}
