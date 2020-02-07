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

class CartController extends Controller
{
    //

    function addtocart(Request $req, $id) {
        $user = Auth::user();
        $phone = Phone::find($id);

        $validation = Validator::make($req->all(), [
            'quantity' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        } else if ($req->quantity <= 0) {
            return redirect()->back()->withErrors("Quantity must be greater than 0");
        } else if ($req->quantity > $phone->stock) {
            return redirect()->back()->withErrors("Quantity cannot exceed the phone's stock");
        }
        $user_id = $user->id;
        $phone_id = $phone->id;
        $qty = $req->quantity;
        $subtotal = ($phone->price - ($phone->price * $phone->discount / 100)) * $req->quantity;

        $data = array(
            'user_id' => $user_id,
            'phone_id' => $phone_id,
            'qty' => $qty,
            'subtotal' => $subtotal
        );

        DB::table('carts')->insert($data);

        return redirect('/cart');
    }

    function delete($id) {
        $find = Cart::find($id);
        $find->delete();

        return redirect()->back();
    }

    function insertcomment(Request $req, $id) {
        $phone_id = $id;
        $user_id = Auth::user()->id;
        $comment = $req->comment;
        $date_time = date("Y-m-j H:i:s");

        $validation = Validator::make($req->all(), [
            'comment' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $data = array(
            'phone_id' => $phone_id,
            'user_id' => $user_id,
            'comment' => $comment,
            'date_time' => $date_time
        );

        DB::table('comments')->insert($data);

        return redirect()->back();
    }

    function completepayment() {
        $users = Auth::user()->id;
        $carts = Cart::where('user_id','=',$users)->get();

        $header = new Header;
        $header->user_id = $users;
        $header->date_time = date("Y-m-j H:i:s");
        $header->status = 'Success';
        $header->save();

        foreach ($carts as $cart) {
            $header_id = $header->id;
            $phone_id = $cart->phone_id;
            $qty = $cart->qty;

            $detail = array(
                'header_id' => $header_id,
                'phone_id' => $phone_id,
                'qty' => $qty
            );

            DB::table('details')->insert($detail);

            $phone = Phone::find($cart->phone_id);
            DB::table('phones')
            ->where('id', $cart->phone_id)
            ->update(['stock' => $phone->stock - $cart->qty]);

            $cart->delete();
        }

        return redirect('/transactionhistory');
    }

    function index_addtocart($id) {
        $data = Phone::find($id);
        $brand = Brand::where('id','=',$data->brand_id)->pluck('name');
        $comment = Comment::where('phone_id','=',$data->id)->get();

        return view('addtocart', compact('data', 'brand', 'comment'));
    }

    function index_cart() {
        $users = Auth::user()->id;
        $data = Cart::where('user_id','=',$users)->get();

        $phones = array();
        $totalqty = 0;
        $grandtotal = 0;
        foreach ($data as $d) {
            $totalqty += $d->qty;
            $grandtotal += $d->subtotal;

            $phone = Phone::where('id','=',$d->phone_id)->get();
            array_push($phones, $phone);
        }

        return view('cart', compact('users','data','totalqty','grandtotal','phones'));
    }
}
