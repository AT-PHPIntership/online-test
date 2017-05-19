<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use Session;
use DB;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id of user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Session::flash('success', trans('messages.user_delete_success'));
        return redirect()->route('admin.user.index');
    }
}
