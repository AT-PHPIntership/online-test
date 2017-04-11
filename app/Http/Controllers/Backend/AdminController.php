<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AdminRequest;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository as Admin;
use File;
use Auth;

class AdminController extends Controller
{
    /**
     * Admin
     *
     * @var admin
     */
    private $admin;
    
    /**
     * Function construct of AdminController
     *
     * @param AdminRepository $admin admin
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admins'] = $this->admin->all(['id', 'name', 'email', 'phone', 'address']);
        return view('backend.admin.index')->with($data);
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
     * @param \Illuminate\Http\Requests\Backend\AdminRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $data['image'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.path')), $data['image']);
        }
        $data['password'] = bcrypt($data['password']);

        $result = $this->admin->create($data);

        if (!$result) {
            flash(trans('messages.error_create_admin'), 'danger');
        } else {
            flash(trans('messages.create_admin_successfull'), 'success');
        }
        return redirect()->route('admin.admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id request update
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin'] = $this->admin->find($id, ['id', 'name', 'email', 'phone', 'address', 'image']);

        if (empty($data['admin'])) {
            flash(trans('messages.error_not_found'), 'danger');
            return back();
        }
      
        return view('backend.admin.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id admin users
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        $account = $this->admin->find($id, ['image']);

        if ($request->hasFile('image')) {
            if ($account->image) {
                file::delete(config('upload.path') . $account->image);
            }
            $img = $request->file('image');
            $data['image'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.path')), $data['image']);
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = array_except($data, ['password']);
        }
      
        $result = $this->admin->update($data, $id);

        if (!$result) {
            flash(trans('messages.error_edit_admin'), 'danger');
        } else {
            flash(trans('messages.edit_admin_successfull'), 'success');
        }
        
        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id admin user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == Auth::guard('admin')->user()->id) {
            return trans('messages.error_delete_admin_login');
        }

        $account = $this->admin->find($id, ['image']);
        
        if (!empty($account->image)) {
            File::delete(config('upload.path') . $account->image);
        }

        $result = $this->admin->delete($id);

        if (!$result) {
            return trans('messages.error_delete_admin');
        }
        
        return trans('messages.delete_admin_successfull');
    }
}
