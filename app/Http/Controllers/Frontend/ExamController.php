<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\UserExam;
use App\Models\UserAnswer;
use App\Models\Question;
use App\Models\Part;
use App\Models\Answer;
use DB;

class ExamController extends Controller
{
    /**
     * Show form test online
     *
     * @param int $idExam of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function test($idExam)
    {
        
        $exam = Exam::findorFail($idExam);
        $questionsPart1  = Exam::find($idExam)->questions->where('part_id', \App\Models\Part::PART_1);
        $questionsPart2  = Exam::find($idExam)->questions->where('part_id', \App\Models\Part::PART_2);
        $questionsPart3  = Exam::find($idExam)->questions->where('part_id', \App\Models\Part::PART_3);
        $questionsPart4  = Exam::find($idExam)->questions->where('part_id', \App\Models\Part::PART_4);
        
        return view('frontend.exams.listening.test', compact('exam', 'questionsPart1', 'questionsPart2', 'questionsPart3', 'questionsPart4'));
    }
    /**
     * Store test online
     *
     * @param Request $request of request
     * @param int     $idExam  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTest(Request $request, $idExam)
    {
        $requestQuestion = $request->all();
        DB::transaction(function () use ($requestQuestion, $idExam) {
            $userExam = new UserExam(['user_id'=>Auth()->user()->id,'exam_id'=>$idExam]);
            $userExam->save();

            for ($i = 1; $i <= count($requestQuestion['answers']); $i++) {
                $userAnswer = new UserAnswer;
                $userAnswer->question_id = $requestQuestion['answers'][$i]['question'];
                $userAnswer->is_correct = (!empty($requestQuestion['answers'][$i]['correct']) ? $requestQuestion['answers'][$i]['correct'] :null);
                $userExam->userAnswers()->save($userAnswer);
            }
        });
        Session::flash('success', trans('messages.listening_success'));
        return redirect()->route('exams.listening.test', $idExam);
    }
}
