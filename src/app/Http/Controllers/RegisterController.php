<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        //バリテーション
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|string|unique:users',
            'password' => 'required|min:8',
        ]);

        //DBインサート
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        //保存
        $user->save();

        //リダイレクト
        return redirect('auth/thanks');
    }

    public function thanks()
    {
        return view('auth/thanks');
    }
}
