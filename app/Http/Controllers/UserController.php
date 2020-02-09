<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\InformasiToko;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return view('app.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'email' => 'unique:users',
            'username' => 'unique:users'
        ]);

        $u = new User;
        $u->name = $r->input('name');
        $u->username = $r->input('username');
        $u->email = $r->input('email');
        $u->alamat = $r->input('alamat');
        $u->level_id = $r->input('level_id');
        $u->password = bcrypt($r->input('password'));
        $u->toko_id = 1;

        $photo = $r->file('photo');
        if (!empty($photo)) {
            $destinationPath = public_path('image/upload/user'); // upload path
            $profilephoto = uniqid() . "." . $photo->getClientOriginalName();
            $photo->move($destinationPath, $profilephoto);
            $u->photo = $profilephoto;
        }
        $u->save();
        return redirect()->route('users.index')->with('alertStore', $r->input('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('app.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $u = User::find($id);
        $u->name = $r->input('name');
        $u->username = $r->input('username');
        $u->email = $r->input('email');
        $u->alamat = $r->input('alamat');
        $u->level_id = $r->input('level_id');
        if (!empty($r->input('password'))) {
            $u->password = bcrypt($r->input('password'));
        }
        $u->toko_id = 1;

        $photo = $r->file('photo');
        if (!empty($photo)) {
            $destinationPath = public_path('image/upload/user'); // upload path
            $profilephoto = uniqid() . "." . $photo->getClientOriginalName();
            $photo->move($destinationPath, $profilephoto);
            $u->photo = $profilephoto;
        }
        $u->save();
        return redirect()->route('users.index')->with('alertUpdate', $r->input('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        unlink(public_path() .  'image/upload/user/' . $user->photo);
        $user->delete();
        return redirect()->route('users.index');
    }

    public function print()
    {
        $user = User::orderBy('id', 'DESC')->get();
        $info = InformasiToko::first();
        return view('app.user.print', compact('user','info'));
    }
}
