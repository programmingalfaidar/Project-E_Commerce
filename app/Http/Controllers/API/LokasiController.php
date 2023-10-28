<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;

class LokasiController extends Controller
{
    public function province()
    {
        return Province::all();
    }

    public function Regency(Request $request, $province_id)
    {
        return Regency::where('province_id', $province_id)->get();
    }
}
