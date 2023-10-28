<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiDetail::with(['transaksi.user', 'product.galleries'])->whereHas('product', function ($product) {
            $product->where('users_id', Auth::user()->id);
        });
        $revenue = $transaksi->get()->reduce(function ($carry, $item) {
            return $carry + $item->harga;
        });

        $customer = User::count();
        return view('pages.dashboard', [
            'transaksi_count' => $transaksi->count(),
            'transaksi_data' => $transaksi->get(),
            'revenue' => $revenue,
            'customer' => $customer
        ]);
    }
}
