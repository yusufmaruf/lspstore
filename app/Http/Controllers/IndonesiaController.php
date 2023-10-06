<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class IndonesiaController extends Controller
{
    public function provinsi()
    {
        $data = Province::where('name', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return response()->json($data);
    }

    public function regency($id)
    {
        $data = Regency::where('province_id', $id)->where('name', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return response()->json($data);
    }
}
