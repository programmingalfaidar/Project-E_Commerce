<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use illuminate\Support\Str;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\ProductGallery;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'category'])
            ->where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard-product', [
            'products' => $products
        ]);
    }

    public function detail(Request $request, $id)
    {
        $products = Product::with((['galleries', 'user', 'category']))->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard-product-details', [
            'product' => $products,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('pages.dashboard-product-create', [
            'categories' => Category::all()
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();
        $data['photos'] = $request->file('photo')->store('assets/products', 'public');

        ProductGallery::create($data);

        return redirect()->route('product-detail', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-detail', $item->products_id);
    }


    public function Tambah(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/products', 'public')

        ];
        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->namaCategory);

        $item = Product::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-product');
    }
}
