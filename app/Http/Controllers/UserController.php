<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function demo()
    {
        $users = Users::all();
        return view('demo',compact('users'));
    }

    public function store(Request $request)
    {
        Users::create([
            'name'=>$request->name
        ]);
        return redirect('/');
    }

    public function destroy($id)
    {
        Users::destroy($id);
        return redirect('/');
    }
}
