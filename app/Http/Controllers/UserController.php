<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;


class UserController extends Controller
{

    public function profile() {
       return view('user/profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request) {

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = Auth::user()->username . time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300,300)->save( public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            //Verwijderd vorige foto
            if ($user->avatar != 'placeholder.png') {
                $path = 'uploads/avatars/';
                $lastpath = Auth::user()->Avatarpath;
                File::Delete(public_path($path . $lastpath));
            }
        }

        return view('user/profile', array('user' => Auth::user()));
        //Image intervention
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allusers = User::all();

        return view('/user/users')->with('allusers', $allusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('/user/user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $username = User::find($id);

        return view('/user/user')->with('username', $username);
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

        return view('user/edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = User::find($id);
        $new->username = $request->username;
        $new->email = $request->email;
        $new->role = $request->role;
        $new->save();
//        $user = User::find($id);
//        $user->role
////        $user->fill($request->input());
//        $user->save();

        return redirect()->route('manageusers', ['id' => $id]);
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

        // De onderstaande delete verwijdert alleen de post en niet de comments
        // Om alle comments ook te verwijderen moet je zoeken op Laravel Model Cascading Delete
        $user->delete();
        return redirect('users/manage');
    }
}
