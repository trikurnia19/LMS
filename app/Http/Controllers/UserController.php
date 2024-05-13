<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\Contracts\CreatesNewUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store(Request $input) {
        $data = $input->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
        ])->validate();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday'=> $data['birthday'],
            'gender'=> $data['gender'],
            'phone_number'=> $data['phone_number'],
            'address'=> $data['address'],
            ]);
            
            $user->assignRole('executive');
            return redirect('home');
        }
}
