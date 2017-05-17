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
use Session;

class ExamController extends Controller
{
    /**
     * Show form test online
     *
     * @param int $idExam of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function listening($idExam)
    {
        $with = [
            'questionsPart1',
            'questionsPart2',
            'questionsPart3',
            'questionsPart4',
            'questionsPart1.answers',
            'questionsPart2.answers',
            'questionsPart3.answers',
            'questionsPart4.answers',
        ];
        $exam = Exam::with($with)->findorFail($idExam);
        return view('frontend.exams.listening.listening', compact('exam'));
    }
    /**
     * Store test online
     *
     * @param Request $request of request
     * @param int     $idExam  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storeListening(Request $request, $idExam)
    {
        $requestQuestion = $request->all();
        DB::transaction(function () use ($requestQuestion, $idExam) {
            $userExam = new UserExam(['user_id'=>Auth()->user()->id,'exam_id'=>$idExam]);
            $userExam->save();

            for ($i = 1; $i <= count($requestQuestion['answers']); $i++) {
                $userAnswer = new UserAnswer;
                $userAnswer->question_id = $requestQuestion['answers'][$i]['question'];
                $userAnswer->is_correct = (!empty($requestQuestion['answers'][$i]['correct']) ? $requestQuestion['answers'][$i]['correct'] :0);
                $userExam->userAnswers()->save($userAnswer);
            }
        });
        Session::flash('success', trans('messages.listening_success'));
        return redirect()->route('exams.listening', $idExam);
    }
    /**
     * Show resultTest
     *
     * @param int $idExam of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function resultTest($idExam)
    {
        $exam = Exam::findorFail($idExam);
        $idUserAnswer = UserExam::where('user_id', Auth()->user()->id)->where('exam_id', $idExam)->orderBy('id', 'DESC')->first()->id;
        $answerCorrects = UserAnswer::where('user_exam_id', $idUserAnswer)->where('is_correct', \App\Models\Answer::IS_CORRECT)->get();
        
        $correctListening = 0;
        foreach ($answerCorrects as $answerCorrect) {
            $correctListening+= count($answerCorrect->question()->get()->wherein('part_id', [\App\Models\Part::PART_1,\App\Models\Part::PART_2,\App\Models\Part::PART_3,\App\Models\Part::PART_4]));
        }
        return view('frontend.exams.result', compact('correctListening', 'exam'));
    }
}
