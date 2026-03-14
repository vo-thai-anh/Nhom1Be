<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /api/users
    public function index()
    {
        return Users::all();
    }

    // GET /api/users/1
    public function show($id)
    {
        return Users::find($id);
    }

    // POST /api/users
    public function store(Request $request)
    {
        $user = Users::create([
            'name' => $request->name
        ]);

        return response()->json($user);
    }

    // DELETE /api/users/1
    public function destroy($id)
    {
        Users::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}