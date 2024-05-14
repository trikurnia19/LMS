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
            return redirect('employee');
        }

        public function edit(User $user)
        {
            
            return view('users.edit', compact('user'));
        }
    
        public function updateUser(Request $request, User $user)
        {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birthday' => 'nullable|date',
            'gender' => 'nullable|string|in:Male,Female,Other',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('gender'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
        ]);
        
            return redirect()->route('users');
        }

        public function destroy(User $user)
        {
            
            $user->delete();

            return redirect()->route('users');
        }

}
