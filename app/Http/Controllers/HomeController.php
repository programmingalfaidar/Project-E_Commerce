<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();

        $products = Product::with(['galleries'])->take(8)->get();
        return view('pages.homePage', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
