<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.user.index', compact('users'));
    }
    public function data()
    {
        $users = User::orderBy('id', 'desc')->get();
        return datatables()
            ->of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($users) {
                return '
                <div class="btn-group">
                <a class="btn btn-xs btn-warning btn-flat" href="' . route('user.edit', $users->id) . '">
                                        Sunting
                                    </a>
                    <button onclick="deleteData(`'  . route('user.destroy', ['user' => $users->id]) . '`)" class="btn btn-xs btn-danger btn-flat">Hapuss</button>
                   
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        $item->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
