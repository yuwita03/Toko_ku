<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class UserPanel extends Controller
{
public function UserPanel()
{
    $products = Product::all();
    $user = Auth::user();

    $foto = $user?->foto;

    $isValidFoto = $foto && trim($foto) !== '' && (
        filter_var($foto, FILTER_VALIDATE_URL) || file_exists(public_path($foto))
    );

    $fotoUrl = $isValidFoto
        ? (filter_var($foto, FILTER_VALIDATE_URL) ? $foto : asset($foto))
        : null;

    return view('user_panel.main', compact('products', 'fotoUrl'));
}

}
