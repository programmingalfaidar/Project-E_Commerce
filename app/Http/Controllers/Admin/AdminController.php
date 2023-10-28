<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index()
    {
        $customer = User::count();
        // fungsi sum merupakan mengambil field
        $totalHarga = Transaksi::sum('total_harga');
        $totalTransaksi = Transaksi::count();


        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'totalharga' => $totalHarga,
            'totalTransaksi' => $totalTransaksi
        ]);
    }
}
