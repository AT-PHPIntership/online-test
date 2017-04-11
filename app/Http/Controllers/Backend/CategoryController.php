<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository as Category;

class CategoryController extends Controller
{
    /**
     * Category
     *
     * @var Category
     */
    private $category;

    /**
     * Construct a CategoryController
     *
     * @param int $category category
     */
    public function __construct(Category $category)
    {
         $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->category->all();
        return view('backend.category.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = $this->category->all(['id','name'])->lists('name', 'id');
        return view('backend.category.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->category->create($request->all());
        if ($result) {
            flash(trans('messages.create_category_successfully'), 'success');
        } else {
            flash(trans('messages.error_create_category'), 'danger');
        }
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = $this->category->all(['name', 'id'])->lists('name', 'id');
        $data['category'] = $this->category->find($id, ['name','parent_id', 'id']);
        if (empty($data['categories'])) {
            flash(trans('messages.error_not_found'), 'danger');
            return back();
        }
        return view('backend.category.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Illuminate\Http\Request $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        if ($data['parent_id'] == $id) {
            $data['parent_id'] = config('app.parent');
        }
        $result = $this->category->update($data, $id);
        if ($result) {
            flash(trans('messages.create_category_successfully'), 'success');
        } else {
            flash(trans('messages.error_create_category'), 'danger');
        }
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = $this->category->find($id);
        if (empty($cate)) {
            return trans('messages.error_not_found');
        }
        
        $promotions = $this->category->find($id)->promotions->count();
        if ($promotions > 0) {
            return trans('messages.not_allow_delete_category');
        } else {
            $children = $this->category->find($id)->children->count();
            if ($children > 0) {
                return trans('messages.not_allow_delete_category');
            }
        }
        
        $result = $this->category->delete($id);
        if ($result) {
            return trans('messages.delete_category_successfull');
        } else {
            return trans('messages.error_delete_category');
        }
    }
}
