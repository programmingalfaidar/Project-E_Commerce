<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        return view('pages.cart', [
            'carts' => $cart
        ]);
    }

    public function delete(Request $request, $id)
    {
        $data = Cart::findOrFail($id);

        $data->delete();

        return redirect()->back();
    }

    public function success()
    {
        return view('pages.success');
    }
}
