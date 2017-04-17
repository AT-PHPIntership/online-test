<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
    * User
    *
    * @var User
    */
    private $user;

    /**
    * Construct a UserController
    *
    * @param int $user user
    */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','DESC')->paginate();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of user
     *
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param int $id of user
     *
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

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
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of user
     * @param int                      $id      of user
     *
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

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
        return redirect()->route('backend.user.index');
    }
}
