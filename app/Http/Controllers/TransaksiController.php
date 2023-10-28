<?php

namespace App\Http\Controllers;



use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiDetail::with(['transaksi.user', 'product.galleries'])->whereHas('product', function ($product) {
            $product->where('users_id', Auth::user()->id);
        })->get();
        $buytransaksi = TransaksiDetail::with(['transaksi.user', 'product.galleries'])->whereHas('transaksi', function ($transaksi) {
            $transaksi->where('users_id', Auth::user()->id);
        })->get();

        return view('pages.dashboard-transaksi', [
            'selTransaksi' => $transaksi,
            'buytransaksi' => $buytransaksi
        ]);
    }

    public function detailTransaksi(Request $request, $id)
    {
        $transaksi = TransaksiDetail::with(['transaksi.user', 'product.galleries'])->findOrFail($id);
        return view('pages.dashboard-transaksi-detail', [
            'transaksi' => $transaksi
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransaksiDetail::findOrFail($id);
        $item->update($data);

        return redirect()->route('detail-transaksi', $id);
    }
}
