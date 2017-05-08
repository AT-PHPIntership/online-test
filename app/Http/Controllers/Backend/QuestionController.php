<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuestionImage;
use App\Http\Requests\Backend\PostPart1Request;
use Session;
use DB;

class QuestionController extends Controller
{
    
    /**
     * Show the form for create the part 1 question
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart1($examId)
    {
        $exam = Exam::findOrFail($examId);
        return view('backend.questions.create.part1', compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart1(PostPart1Request $request, $examId)
    {
        $requestQuestions = $request->all();
        DB::transaction(function () use ($requestQuestions, $examId) {
            for ($i = 1; $i <= count($requestQuestions['question']); $i++) {
                $question = new Question;
                $question->exam_id = $examId;
                $question->part_id = \App\Models\Part::PART_1;
                $question->save();

                $questionImage = new QuestionImage;
                $requestQuestionsI = $requestQuestions['question'][$i];
                $questionImage->image = $requestQuestionsI['image']->hashName();
                $requestQuestionsI['image']->move(config('constant.upload_questions_img'), $requestQuestionsI['image']->hashName());
                $question->questionImage()->save($questionImage);

                for ($j = 0; $j< \App\Models\Answer::NUMBER_ANSWER_4; $j++) {
                    $answer = new Answer;
                    if ($requestQuestionsI['correct'] == $j) {
                        $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                    } else {
                        $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                    }
                    $question->answers()->save($answer);
                }
            }
        });
        Session::flash('success', trans('messages.part1_create_success'));
        return redirect()->route('admin.exam.create.part2', $examId);
    }

    /**
     * Show the form for create the part 1 question
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart7($examId)
    {
        $exam = Exam::findOrFail($examId);
        return view('backend.questions.create.part7', compact('exam'));
    }

}
