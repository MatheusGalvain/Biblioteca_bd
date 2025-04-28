<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'desc')->get();
        return view('usuarios.index', 
        [
            'users'=>$users
        ]
    );
    }

    public function create() {
        $users = User::all();
        return view('usuarios.create', 
        [
            'users'=>$users
        ]
    );
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::create($request->all());
        return redirect()->route('usuarios-index');
    }

    public function edit($id) {
        $users = User::where('id', $id)->first();
        return view('usuarios.edit',
        [
            'users'=>$users
        ]
    );
    }

    public function update(Request $request, $id) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $users = User::where('id', $id)->update($data);
        return redirect()->route('usuarios-index');
    }

    public function destroy($id) {
        $users = User::where('id', $id)->delete();
        return redirect()->route('usuarios-index');
    }
}
