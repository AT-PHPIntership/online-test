<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\AdminUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminUserRequest;
use App\Http\Requests\Backend\AdminUserEditRequest;
use Session;

class AdminUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUsers = AdminUser::orderBy('created_at', 'DESC')->paginate();
        return view('backend.admin.index', compact('adminUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of admin user
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        $adminUser = new AdminUser($request->all());
        $adminUser->save();
        Session::flash('success', trans('messages.admin_user_create_success'));
        return redirect()->route('admin.admin-user.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of admin user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminUser = AdminUser::findOrFail($id);
        return view('backend.admin.edit', compact('adminUser'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of admin user
     * @param int                      $id      of admin user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserEditRequest $request, $id)
    {
        $adminUser = AdminUser::findOrFail($id);
        $adminUser->name = $request->get('name');
        $adminUser->sex = $request->get('sex');
        $adminUser->birthday = $request->get('birthday');
        $adminUser->save();
        Session::flash('success', trans('messages.admin_user_update_success'));
        return redirect()->route('admin.admin-user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of admin user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUser::findOrFail($id)->delete();
        Session::flash('success', trans('messages.user_delete_success'));
        return redirect()->route('admin.admin-user.index');
    }
}
