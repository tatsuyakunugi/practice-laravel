<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
        ]);
    }

    public function create(array $data)
    {
        $this->validator($data)->validate();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verify_token' => base64_encode($data['email']),
        ]);

        $email = new EmailVerification($user);
        Mail::to($user->email)->send($email);

        return $user;
    }

    public function postRegister(RegisterRequest $request)
    {
        event(new Registered($user = $this->create( $request->all() )));

        return view('auth.registered');
    }

    public function verify($email_token)
    {
        $user = User::where('email_verify_token', $email_token)->first();

        if(!$user)
        {
            Session::put('error', '無効なトークンです');
            return view('auth.thanks');
        }elseif($user->email_verified){
            Session::put('message', 'すでに本登録されています。ログインして利用してください。');
            return view('auth.thanks');
        }else{
            $user->verified();
            Session::put('message', 'ご登録ありがとうございました。ログインして利用してください。');
            return view('auth.thanks');
        }   
    }

    //public function postRegister(RegisterRequest $request)
    //{
        //バリテーション
        //$this->validate($request,[
            //'name' => 'required',
            //'email' => 'email|required|string|unique:users',
            //'password' => 'required|min:8',
        //]);

        //DBインサート
        //$user = new User([
            //'name' => $request->input('name'),
            //'email' => $request->input('email'),
            //'password' => Hash::make($request->input('password')),
        //]);

        //保存
        //$user->save();

        //リダイレクト
        //return redirect('auth/thanks');
    //}

    public function thanks()
    {
        return view('auth/thanks');
    }
}
