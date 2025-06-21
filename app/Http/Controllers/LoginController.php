<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('userpanel');
        }
        return view('user_form.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('userpanel');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user_form.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'hp' => 'required|min:10|max:13',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_url' => 'nullable|url',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->hp = $request->hp;


        if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

        // upload file baru
        $oldFoto = $user->foto;

        if ($request->hasFile('foto')) {
            // Upload foto baru
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $filename);
            $user->foto = 'images/' . $filename;

            // Hapus foto lama jika lokal
            if ($oldFoto && file_exists(public_path($oldFoto)) && !filter_var($oldFoto, FILTER_VALIDATE_URL)) {
                unlink(public_path($oldFoto));
            }

        } elseif ($request->filled('foto_url')) {
            // Jika tidak upload file, pakai URL
            $user->foto = $request->foto_url;

            // Hapus foto lama jika lokal
            if ($oldFoto && file_exists(public_path($oldFoto)) && !filter_var($oldFoto, FILTER_VALIDATE_URL)) {
                unlink(public_path($oldFoto));
            }
        }
        $user->save();

        return redirect()->route('akun.edit')->with('success', 'Akun berhasil diperbarui.');
    }
}
