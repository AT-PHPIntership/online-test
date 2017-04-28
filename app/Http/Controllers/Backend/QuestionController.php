<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Part;
use App\Models\Exam;
use App\Models\QuestionImage;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\QuestionPart1Request;
use DB;
use Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('part_id', 'ASC')->paginate();
        return view('backend.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = Exam::orderBy('id', 'ASC')->paginate();
        return view('backend.questions.create', compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of questions
     *
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionPart1Request $request)
    {
        $requestQuestions = $request->all();
        $examId = $request->exam_id;
        DB::transaction(function () use ($requestQuestions, $examId) {
            for ($i=0; $i < count($requestQuestions['content']); $i++) {
                $newQuestion = new Question;
                $newQuestion->exam_id = $examId;
                $newQuestion->part_id = 1;
                $newQuestion->content = $requestQuestions['content'][$i];
                $newQuestion->save();
                $questionId = $newQuestion->id;

                $newQuestionImage = new QuestionImage;
                $newQuestionImage->question_id = $questionId ;
                $newQuestionImage->image = $requestQuestions['image'][$i]->hashName();
                $requestQuestions['image'][$i]->move(config('constant.upload_questions_img'), $requestQuestions['image'][$i]->hashName());
                $newQuestionImage->save();
            }
        });
        Session::flash('success', trans('messages.part1_create_success'));
        return redirect()->route('admin.questions.createPart2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart2()
    {
        return view('backend.questions.createpart2');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request $request
    //  * @param  int                      $id
    //  * @return \Illuminate\Http\Response
     
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
