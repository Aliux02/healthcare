<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Hospital;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

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
            'surname' => ['required', 'string', 'max:255'],
            'ak' => ['required', 'integer'],
            'phone' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'surname' => $input['surname'],
            'address' => $input['address'],
            'ak' => $input['ak'],
            'phone' => $input['phone'],
            'status' => 0,
            'permission_lvl' => 10,
            'password' => Hash::make($input['password']),
        ]);

        $hospitals = explode("|,",$input['hospital']);
         
        foreach($hospitals as $h){
            $h=str_replace("|","",$h);
            Hospital::create([
            'name' => $h,
            'user_id' => $user->id
        ]);
       
      }
      return $user;
    }
}
