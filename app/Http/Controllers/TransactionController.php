<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Brand;
use App\Comment;
use App\User;
use App\Cart;
use App\Transaction;
use App\Header;
use App\Detail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class TransactionController extends Controller
{
    //

    function index_history() {
        $user_id = Auth::user()->id;
        $histories = Header::where('user_id','=',$user_id)->get();

        return view('transactionhistory', compact('user_id','histories'));
    }

    function index_list() {
        $lists = Header::all();

        return view('transactionlist', compact('lists'));
    }

    function index_detail($id) {
        $user_id = Auth::user()->id;
        $headers = Header::find($id);
        $details = Detail::where('header_id','=',$headers->id)->get();
        
        $totalqty = 0;
        $grandtotal = 0;

        foreach ($details as $detail) {
            $subtotal = 0;
            
            $totalqty += $detail->qty;
            $subtotal = $detail->phone->price * $detail->qty;
            $grandtotal += $subtotal;
        }

        return view('transactiondetail', compact('details','subtotal','totalqty','grandtotal'));
    }

    function delete($id) {
        $findDetail = Detail::find($id);
        $findHeader = Header::find($id);
        
        $findDetail->delete();
        $findHeader->delete();

        return redirect()->back();
    }
}
