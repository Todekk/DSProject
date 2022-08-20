<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['min:8', 'required'],     
            'password_confirmation' => 'same:password'       
        ], $validationMessages = [
            'name.min'=>'Потребителското име трябва да е минимум 3 симовола!',
            'name.required' => 'Това поле е задължително!',
            'name.max'=>'Потребителското име е твърде дълга!',
            'email.email' => 'Въведете валидна е-поща!',
            'email.unique' => 'Тази е-поща е използвана!',
            'email.max' => 'Е-пощата не може да надминава 255 символа!',
            'email.required' => 'Това поле е задължително!',
            'password.required' => 'Това поле е задължително!',            
            'password.min' => 'Паролата трябва да е минимум 8 символа!',
            'password_confirmation.same' => 'Паролите не съвпадат!'
        ])->validate($validationMessages);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
