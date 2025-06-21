<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user_form.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|unique:user,email',
            'password'  => 'required|string|min:6|confirmed',
            'role'      => 'required|in:0,1,2',
            'hp'        => 'nullable|string|max:20',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $fotoName);
            $fotoPath = 'images/'.$fotoName;
        }

        $user = User::create([
            'nama'      => $validated['nama'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
            'hp'        => $validated['hp'] ?? null,
            'foto'      => $fotoPath,
            'role'      => $validated['role'], // <-- angka
            'status'    => 1, // Default status aktif
        ]);

        Auth::login($user);

        return redirect()->route('userpanel');
    }
}
