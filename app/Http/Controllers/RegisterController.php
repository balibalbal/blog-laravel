<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () {
        return view('frontend.pages.register.index', ['title' => 'Register']);
    }

    public function store (Request $request)
    {
        //return $request->all(); //cetak data sementara

        $validasiData = $request->validate([
            'name'      =>'required|min:5|max:255',
            'username'  => ['required','min:5','max:255','unique:users'], //bisa juga bentuk array seperti ini
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5|max:255'
        ]);
        
        //enkripsi password sebelum masuk database
        //$validasiData['password'] = bcrypt($validasiData['password']);
        //atau
        $validasiData['password'] = Hash::make($validasiData['password']);

        User::create($validasiData);

        $request->session()->flash('success','Registrasi berhasil. Silahkan login');
        return redirect('/login');
    }
}
