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

class PhoneController extends Controller
{
    //

    function insert(Request $req) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3|unique:phones',
            'brand' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required',
            'price' => 'required|integer|min:1000',
            'discount' => 'required|integer|max:100',
            'stock' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $image = $req->file('image');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('images/', $formatName);

        $name = $req->input('name');
        $brand_id = $req->input('brand');
        $image = $formatName;
        $description = $req->input('description');
        $price = $req->input('price');
        $discount = $req->input('discount');
        $stock = $req->input('stock');

        $data = array(
            'name' => $name,
            'brand_id' => $brand_id,
            'image' => $image,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'stock' => $stock
        );
        DB::table('phones')->insert($data);

        return redirect('/home');
    }

    function update(Request $req, $id) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3|unique:phones',
            'brand' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required',
            'price' => 'required|integer|min:1000',
            'discount' => 'required|integer|max:100',
            'stock' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $findPhone = Phone::find($id);

        $image = $req->file('image');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('images/', $formatName);

        $findPhone->name = $req->name;
        $findPhone->brand_id = $req->brand;
        $findPhone->image = $formatName;
        $findPhone->description = $req->description;
        $findPhone->price = $req->price;
        $findPhone->discount = $req->discount;
        $findPhone->stock = $req->stock;
        $findPhone->save();

        return redirect('/managephone');
    }

    function delete($id) {
        $findPhone = Phone::find($id);
        $findPhone->delete();

        return redirect()->back();
    }

    function search(Request $req) {
        if ($req->searchType == 'phoneName') {
            $data = Phone::where('name','LIKE','%'.$req->keyword.'%')->paginate(8);
        } else if ($req->searchType == 'phoneBrand') {
            $brand = Brand::where('name','like','%'.$req->keyword.'%')->pluck('id');
            $data = Phone::where('brand_id','=',$brand)->paginate(8);
        }
        $brandData = Brand::all();

        if (Auth::user()->role == 'admin') {
            return view('managephone', compact('data', 'brandData'));
        } else if (Auth::user()->role == 'user') {
            return view('phonelist', compact('data', 'brandData'));
        }
    }

    function index_update($id) {
        $data = Phone::with('Brand')->get();
        $phoneData = Phone::find($id);
        $brandData = Brand::all();

        return view('updatephone', compact('data','brandData', 'phoneData'));
    }

    function index_insert() {
        $data = Phone::with('Brand')->paginate(8);
        $brandData = Brand::all();

        return view('insertphone',compact('data', 'brandData'));
    }

    function index_manage() {
        $data = Phone::with('Brand')->paginate(8);
        $brandData = Brand::all();

        return view('managephone',compact('data', 'brandData'));
    }

    function index_phonelist() {
        $data = Phone::with('Brand')->paginate(8);
        $brandData = Brand::all();

        return view('phonelist',compact('data', 'brandData'));
    }
    
}
