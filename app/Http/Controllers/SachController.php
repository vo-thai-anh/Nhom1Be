<?php

namespace App\Http\Controllers;
use App\Models\Sach;
use Illuminate\Http\Request;

class SachController extends Controller
{
    public function index()
    {
        $sachs = Sach::with('loaisach')->paginate(12);

        return response()->json([
            'success' => true,
            'data'    => $sachs
        ]);
    }
    public function filter(Request $request)
    {
        $query = Sach::with('loaisach');
        if ($request->has('loai_sach_id') && $request->loai_sach_id != '') {
            $query->where('loai_sach_id', $request->loai_sach_id);
        }
        if ($request->has('nha_xuat_ban') && $request->nha_xuat_ban != '') {
            $query->where('nha_xuat_ban', 'LIKE', '%' . $request->nha_xuat_ban . '%');
        }
        if ($request->has('gia_min') && $request->gia_min != '') {
            $query->where('gia', '>=', $request->gia_min);
        }
        if ($request->has('gia_max') && $request->gia_max != '') {
            $query->where('gia', '<=', $request->gia_max);
        }
        if ($request->has('sort_by') && $request->sort_by != '') {
            switch ($request->sort_by) {
                case 'gia_tang':
                    $query->orderBy('gia', 'asc');
                    break;
                case 'gia_giam':
                    $query->orderBy('gia', 'desc');
                    break;
                case 'moi_nhat':
                    $query->orderBy('id', 'desc');
                    break;
            }
        } else {
            $query->orderBy('id', 'desc');
        }

        $sachs = $query->paginate(12);

        return response()->json([
            'success' => true,
            'data'    => $sachs
        ]);
    }
    public function show($id)
    {
        $sach = Sach::with('loaisach')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data'    => $sach
        ]);
    }
}
