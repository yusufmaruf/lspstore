<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.admin.category.index', compact('categories'));
    }
    public function data()
    {
        $kategori = Category::orderBy('idCategory', 'desc')->get();
        return datatables()
            ->of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`' . route('category.update', $kategori->idCategory) . '`)" class="btn btn-xs btn-info btn-flat">Edit</button>
                    <button onclick="deleteData(`'  . route('category.destroy', ['category' => $kategori->idCategory]) . '`)" class="btn btn-xs btn-danger btn-flat">Hapuss</button>
                   
                </div>
                ';
            })
            ->addColumn('image', function ($kategori) {
                return '<image src="' . Storage::url($kategori->image) . '" width="50px" class="img-circle elevation-2" alt="User Image">';
            })
            ->rawColumns(['aksi', 'image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Code to store the user data in the database
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',


        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['image'] = $request->file('image')->store('assets/category', 'public');
        Category::create($data);
        $message = 'Berhasil Menambahkan Produk';
        return redirect()->route('category.index')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = Category::find($id);

        return response()->json($kategori);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();

        $item = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }            // Upload foto baru
            $data['image'] = $request->file('image')->store('assets/category', 'public');
        }

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Category::where('idCategory', $id)->first();


        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return redirect()->route('category.index');
    }
}
