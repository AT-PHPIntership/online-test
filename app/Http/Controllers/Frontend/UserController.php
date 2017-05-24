<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use App\Http\Requests\Frontend\UserEditRequest;
use Session;

class UserController extends Controller
{
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
            return view('frontend.user.edit', compact('user'));
        } else {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of user
     * @param int                      $id      of user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('success', trans('messages.user_update_success'));
        return redirect()->route('home');
    }
}
