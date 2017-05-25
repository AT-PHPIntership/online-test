<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class UpdatePasswordController extends Controller
{
    /**
     * Ensure the user is signed in to access this page
     */
    public function __construct()
    {
 
        $this->middleware('auth:web');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($id == Auth::user()->id) {
            return view('frontend.user.change-password', compact('user'));
        } else {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
 
        if (Hash::check($request->old, $hashedPassword)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 
            Session::flash('update', 'Your password has been changed. Please Login!');
 
            return redirect()->route('login');
        } else {
            Session::flash('failure', 'Your password has not been changed.');
 
            return redirect()->route('home');
        }
    }
}
