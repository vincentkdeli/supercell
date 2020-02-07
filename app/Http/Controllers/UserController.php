<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    //
    function login (Request $req) {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if ($req->has('remember')) {
                Cookie::queue('email', $req->email, 60);
                Cookie::queue('password', $req->password, 60);
            }
            return redirect('/home');
        }
        return redirect()->back()->withErrors(['Wrong username or password']);
    }

    function register(Request $req) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:confirm|same:confirm|alpha_num|min:5',
            'confirm' => 'min:5',
            'profilepicture' => 'required',
            'gender' => 'required',
            'dateofbirth' => 'required|date|before:-10 years',
            'address' => 'required|min:10'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $image = $req->file('profilepicture');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('images/', $formatName);

        $name = $req->input('name');
        $email = $req->input('email');
        $password = bcrypt($req->input('password'));
        $profilepicture = $formatName;
        $gender = $req->input('gender');
        $dateofbirth = date('Y-m-d', strtotime($req->input('dateofbirth')));
        $address = $req->input('address');
        $role = "user";

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'profilepicture' => $profilepicture,
            'gender' => $gender,
            'dateofbirth' => $dateofbirth,
            'address' => $address,
            'role' => $role
        );
        DB::table('users')->insert($data);

        return redirect('/login');
    }

    function update(Request $req) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'profilepicture' => 'required',
            'gender' => 'required',
            'dateofbirth' => 'required|date|before:-10years',
            'address' => 'required|min:10'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $id = Auth::user()->id;
        $findUser = User::find($id);

        $image = $req->file('profilepicture');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('images/', $formatName);

        $findUser->name = $req->name;
        $findUser->email = $req->email;
        $findUser->profilepicture = $formatName;
        $findUser->gender = $req->gender;
        $findUser->dateofbirth = $req->dateofbirth;
        $findUser->address = $req->address;
        $findUser->save();

        return redirect('/home');
    }
    
    function delete($id) {
        $findUser = User::find($id);
        $findUser->delete();

        return redirect()->back();
    }

    function insertmember(Request $req) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:confirm|same:confirm|alpha_num|min:5',
            'confirm' => 'min:5',
            'profilepicture' => 'required',
            'gender' => 'required',
            'dateofbirth' => 'required|date|before:-10 years',
            'address' => 'required|min:10'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $image = $req->file('profilepicture');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('images/', $formatName);

        $name = $req->input('name');
        $email = $req->input('email');
        $password = bcrypt($req->input('password'));
        $profilepicture = $formatName;
        $gender = $req->input('gender');
        $dateofbirth = date('Y-m-d', strtotime($req->input('dateofbirth')));
        $address = $req->input('address');
        $role = "user";

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'profilepicture' => $profilepicture,
            'gender' => $gender,
            'dateofbirth' => $dateofbirth,
            'address' => $address,
            'role' => $role
        );
        DB::table('users')->insert($data);

        return redirect('/home');
    }

    function updatemember(Request $req, $id) {
        $validation = Validator::make($req->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'profilepicture' => 'required',
            'gender' => 'required',
            'dateofbirth' => 'required|date|before:-10years',
            'address' => 'required|min:10'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $findUser = User::find($id);

        $image = $req->file('profilepicture');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('images/', $formatName);

        $findUser->name = $req->name;
        $findUser->email = $req->email;
        $findUser->profilepicture = $formatName;
        $findUser->gender = $req->gender;
        $findUser->dateofbirth = $req->dateofbirth;
        $findUser->address = $req->address;
        $findUser->save();

        return redirect('/managemember');
    }

    function index_updatemember($id) {
        $data = User::find($id);

        return view('updatemember',compact('data'));
    }

    function index_manage() {
        $data = User::all();

        return view('managemember',compact('data'));
    }
}
