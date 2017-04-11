<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;

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
        $data['users'] = $this->user->all();
        return view('backend.user.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = $this->user->find($id);
        if (empty($data['user'])) {
            flash(trans('messages.error_not_found'), 'danger');
            return back();
        }
        return view('backend.user.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
