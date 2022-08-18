<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function register_form()
    {
        return view('registerUser');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'min:3|max:20',
            'email'=>'email',
            'password' => 'min:8',
            'password2' => 'same:password',
        ],[
            'username.min'=>'Потребителското име трябва да е минимум 3 симовола!',
            'username.max'=>'Потребителското име е твърде дълга!',
            'email.email' => 'Въведете валидна е-поща!',
            'password.min' => 'Паролата трябва да е минимум 8 символа!',
            'password2.same' => 'Паролите не съвпадат!',
        ]);
        if($validator->fails()){
            return redirect()->route('register_url')
            ->withErrors($validator)
            ->withInput();
        }
        return redirect()->route('register_url')->with('success', 'Вече си регистриран');
    }
}