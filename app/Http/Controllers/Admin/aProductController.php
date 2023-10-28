<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\User;
use illuminate\Support\Str;

class aProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = Product::with(['user', 'category']);

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                         <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                              type="button" data-toggle="dropdown">Aksi
                           </button>
                             <div class="dropdown-menu">
                               <a class="dropdown-item" href="' . route('product.edit', $item->id) . '">
                                    Sunting
                                 </a>
                                 <form action="' . route('product.destroy', $item->id) . '" method="POST">
                                  ' . method_field('delete') . csrf_field() . '
                                  <button type="submit" class="dropdown-item text-danger">Hapus
                                  </button>
                                 </form>
                             </div>
                          </div>
                    </div>
                ';
            })->rawColumns(['action'])->make();
        }
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product.create', [
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::findOrFail($id);

        return view('pages.admin.Product.edit', [
            'item' => $item,
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->namaCategory);

        $item = Product::findOrFail($id);

        $item->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);

        $item->delete();

        return redirect()->route('product.index');
    }
}
