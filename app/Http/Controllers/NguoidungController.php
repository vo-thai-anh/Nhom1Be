<?php

namespace App\Http\Controllers;
use App\Models\Nguoidung;
use Illuminate\Http\Request;

class NguoidungController extends Controller
{
    public function index()
    {
        return Nguoidung::all();
    }

    public function store(Request $request)
    {
        return Nguoidung::create($request->all());
    }

    public function show($id)
    {
        return Nguoidung::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = Nguoidung::find($id);
        $user->update($request->all());

        return $user;
    }

    public function destroy($id)
    {
        return Nguoidung::destroy($id);
    }
    public function login(Request $request)
{
    $user = Nguoidung::where('email', $request->email)
        ->where('mat_khau', $request->mat_khau)
        ->first();

    if(!$user)
    {
        return response()->json([
            "message"=>"Sai tài khoản"
        ],401);
    }

    return $user;
}
}
