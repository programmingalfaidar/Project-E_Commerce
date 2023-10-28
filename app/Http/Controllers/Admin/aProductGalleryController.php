<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;
use App\Http\Requests\Admin\ProductGalleryRequest;
use App\Models\Product;

class aProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery::with(['products']);

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                         <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                              type="button" data-toggle="dropdown">Aksi
                           </button>
                             <div class="dropdown-menu">
                                 <form action="' . route('product-gallery.destroy', $item->id) . '" method="POST">
                                  ' . method_field('delete') . csrf_field() . '
                                  <button type="submit" class="dropdown-item text-danger">Hapus
                                  </button>
                                 </form>
                             </div>
                          </div>
                    </div>
                ';
            })->editColumn('photos', function ($item) {
                return $item->photos ? '<img src="' . Storage::url($item->photos) . '"style="max-height:80px;" />' : '';
            })->rawColumns(['action', 'photos'])->make();
        }
        return view('pages.admin.ProductGallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.ProductGallery.create', [
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request)
    {
        $data  = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/products', 'public');

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }
}
