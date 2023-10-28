<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;
use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiDetail;
use Midtrans\Snap;
use Midtrans\Config;

class ChekoutController extends Controller
{
    public function proses(Request $request)
    {
        // Proses save data user
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proeses Chekout
        $code = 'Store-' . mt_rand(00000, 9999999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        // Buat Transasksi Create

        $transaksi = Transaksi::create([
            'users_id' => Auth::user()->id,
            'harga_asuransi' => 0,
            'harga_pengiriman' => 0,
            'total_harga' => $request->total_harga,
            'status_transaksi' => 'PENDING',
            'code' =>  $code
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(00000, 9999999);
            TransaksiDetail::create([
                'transaksis_id' => $transaksi->id,
                'products_id' => $cart->product->id,
                'harga' => $cart->product->price,
                'status_transaksi' => 'PENDING',
                'resi' => '',
                'code' => $code
            ]);
        }

        // delete cart pesanan ketika sudah chekout
        Cart::where('users_id', Auth::user()->id)->delete();

        //    Konfigurasi Midtrans
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // buat array untuk ke midtranst pembayaran payment gateayw
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_harga,

            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,

            ],
            'enabled_payments' => [
                'gopay', 'pernata_va', 'bank_transfer'
            ],
            'vtweb' => []

        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
    }
}
