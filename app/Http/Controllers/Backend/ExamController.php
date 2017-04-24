<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ExamPostRequest;
use App\Http\Requests\ExamPutRequest;
use Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::orderBy('id', 'DESC')->paginate();
        return view('backend.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ExamPostRequest $request)
    {
        $exams = new Exam($request->all());
        $exams->count_test = 0;
        if ($request->hasFile('audio')) {
            $exams ->audio= $request->audio->hashName();
            $request->file('audio')->move(config('constant.upload_file_audio'), $exams ->audio);
        }
        $result = $exams ->save();
        if ($result) {
            Session::flash('success', trans('messages.exams_create_success'));
            return redirect()->route('admin.exams.index');
        } else {
            Session::flash('error', trans('messages.exams_create_errors'));
            return redirect()->route('admin.exams.create');
        }
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
     * @param int $id of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('backend.exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exam
     * @param int                      $id      of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ExamPutRequest $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->fill($request->all());
        if ($request ->audio) {
            $exam ->audio = $request->audio->hashName();
            $request->file('audio')->move(config('constant.upload_file_audio'), $exam ->audio);
        }
        $result = $exam ->update();
        if ($result) {
            Session::flash('success', trans('messages.exams_edit_success'));
            return redirect()->route('admin.exams.index');
        } else {
            Session::flash('error', trans('messages.exams_edit_errors'));
            return redirect()->route('admin.exams.create');
        }
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