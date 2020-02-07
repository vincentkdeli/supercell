<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class BrandController extends Controller
{
    //
    function insert(Request $req) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|unique:brands'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $name = $req->input('name');
        $data = array(
            'name' => $name
        );
        DB::table('brands')->insert($data);

        return redirect('/home');
    }

    function update(Request $req, $id) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|unique:brands'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $findBrand = Brand::find($id);
        $findBrand->name = $req->name;
        $findBrand->save();

        return redirect('/managebrand');
    }

    function delete($id) {
        $findBrand = Brand::find($id);
        $findBrand->delete();

        return redirect()->back();
    }

    function index_manage() {
        $data = Brand::all();
        return view('managebrand',compact('data'));
    }

    function index_update($id) {
        $data = Brand::find($id);
        return view('updatebrand',compact('data'));
    }
}
