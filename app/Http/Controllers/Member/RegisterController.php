<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('member.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            // 'phone_number' => 'required',
        ]);

        $data = $request->except('token');

        $isEmailExists = User::where('email', $request->email)->exists();

        if ($isEmailExists) {
            return back()->withErrors([
                'error' => 'The email is already exists'
            ])->withInput();
        }

        $data['role'] = 'member';
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return back();
    }
}
