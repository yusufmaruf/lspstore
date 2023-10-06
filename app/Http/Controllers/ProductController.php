<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.product.index', compact('products'));
    }

    public function data()
    {
        $product = Product::with(['category']);
        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('aksi', function ($product) {
                return '
                <div class="btn-group">
                <a class="btn btn-xs btn-warning btn-flat" href="' . route('product.edit', $product->idProduct) . '">
                                        Sunting
                                    </a>
                    <button onclick="deleteData(`'  . route('product.destroy', ['product' => $product->idProduct]) . '`)" class="btn btn-xs btn-danger btn-flat">Hapuss</button>
                   
                </div>
                ';
            })
            ->addColumn('desc', function ($product) {
                return  $product->desc;
            })
            ->addColumn('image', function ($product) {
                return '<image src="' . Storage::url($product->image) . '" width="50px" class="img-circle elevation-2" alt="User Image">';
            })
            ->rawColumns(['image', 'aksi', 'desc'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required',
            'idCategory' => 'required',
            'stok' => 'required',
            'desc' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['image'] = $request->file('image')->store('assets/category', 'public');
        Product::create($data);
        $message = 'Berhasil Menambahkan Produk';
        return redirect()->route('product.index')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        // $product = Product::where('idProduct', $id)->first();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.product.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }            // Upload foto baru
            $data['image'] = $request->file('image')->store('assets/category', 'public');
        }

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Product::where('idProduct', $id)->first();


        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return redirect()->route('category.index');
    }
}
