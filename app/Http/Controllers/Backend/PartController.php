<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Http\Requests\PartRequest;
use Session;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::paginate();
        return view('backend.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of parts
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PartRequest $request)
    {
        $part = new Part($request->all());
        $part ->save();
        Session::flash('success', trans('messages.part_create_success'));
        return redirect()->route('admin.parts.index');
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of part
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $part = Part::findOrFail($id);
        return view('backend.parts.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of part
     * @param int                      $id      of part
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PartRequest $request, $id)
    {
        Part::findOrFail($id)->update($request->all());
        Session::flash('success', trans('messages.part_edit_success'));
        return redirect()->route('admin.parts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Part::findOrFail($id)->delete();
        Session::flash('success', trans('messages.part_delete_success'));
        return redirect()->route('admin.parts.index');
    }
}
