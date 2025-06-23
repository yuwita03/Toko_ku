<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    // Hanya admin (role = 0) yang boleh akses
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:0');
    }

    public function index()
    {
        $users = User::orderBy('nama')->get();
        return view('admin.users_edit', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users_edit_form', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'hp' => 'required|min:10|max:13',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_url' => 'nullable|url',
            'alamat' =>'required|string|max:255',
            'role' => 'required|in:0,1,2',
            'status' => 'required|in:0,1',
        ]);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $oldFoto = $user->foto;

        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $filename);
            $user->foto = 'images/' . $filename;

            if ($oldFoto && file_exists(public_path($oldFoto)) && !filter_var($oldFoto, FILTER_VALIDATE_URL)) {
                unlink(public_path($oldFoto));
            }
        } elseif ($request->filled('foto_url')) {
            $user->foto = $request->foto_url;

            if ($oldFoto && file_exists(public_path($oldFoto)) && !filter_var($oldFoto, FILTER_VALIDATE_URL)) {
                unlink(public_path($oldFoto));
            }
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');

    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Cegah admin menghapus dirinya sendiri
        if ($user->id == auth()->id()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        // Hapus foto jika foto lokal
        if ($user->foto && file_exists(public_path($user->foto)) && !filter_var($user->foto, FILTER_VALIDATE_URL)) {
            unlink(public_path($user->foto));
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil dihapus.');
    }

}
