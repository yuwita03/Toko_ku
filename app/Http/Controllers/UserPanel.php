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
        return view('user_panel.main',compact('products'));
    }
}
