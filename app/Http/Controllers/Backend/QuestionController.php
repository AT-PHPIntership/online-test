<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Part2Request;
use App\Http\Requests\Backend\Part3Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Part;
use Session;
use DB;

class QuestionController extends Controller
{
    /**
     * Show the form for setup part 2 exam the specified resource.
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreatePart2($examId)
    {
        $exam = Exam::findOrFail($examId);
        return view('backend.parts.createpart2', compact('exam'));
    }

    /**
     * Create a new part 2 for exam
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreatePart2(Part2Request $request, $examId)
    {
        $requestQuestion = $request->all();
        DB::transaction(function () use ($requestQuestion, $examId) {
            for ($i = 1; $i <= count($requestQuestion['question']); $i++) {
                $question = new Question;
                $question->exam_id = $examId;
                $question->part_id = \App\Models\Part::PART_2;
                $question->save();
                for ($j = 0; $j< \App\Models\Answer::NUMBER_ANSWER_PART_2; $j++) {
                    $answer = new Answer;
                    if ($requestQuestion['question'][$i]['correct']== $j) {
                        $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                    } else {
                        $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                    }
                    $question->answers()->save($answer);
                }
            }
        });
        Session::flash('success', trans('messages.part2_create_success'));
        return redirect()->route('admin.exam.create.part3', $examId);
    }

    /**
     * Show the form for setup part 3 exam the specified resource.
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreatePart3($examId)
    {
        $exam = Exam::findOrFail($examId);
        return view('backend.parts.createpart3', compact('exam'));
    }

    /**
     * Create a new part 3 for exam
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreatePart3(Part3Request $request, $examId)
    {
        $requestQuestion = $request->all();
        // dd($requestQuestion);
        DB::transaction(function () use ($requestQuestion, $examId) {
            for ($i = 1; $i <= count($requestQuestion['question']); $i++) {
                $question = new Question;
                $question->exam_id = $examId;
                $question->part_id = \App\Models\Part::PART_3;
                $question->content = $requestQuestion['question'][$i]['content'];
                $question->save();
                for ($j = 0; $j< \App\Models\Answer::NUMBER_ANSWER_PART_3; $j++) {
                    $answer = new Answer;
                    $answer->content = $requestQuestion['question'][$i]['answer'][$j];
                    if ($requestQuestion['question'][$i]['correct']== $j) {
                        $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                    } else {
                        $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                    }
                    $question->answers()->save($answer);
                }
            }
        });
        Session::flash('success', trans('messages.part3_create_success'));
        // return redirect()->route('admin.exam.create.part4', $examId);
        dd('ok');
    }
}
