<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Part;
use App\Models\UserExam;
use App\Models\UserAnswer;
use App\Models\SummaryImage;
use App\Models\QuestionGroup;
use App\Models\SummaryText;
use App\Models\Summary;
use DB;
use Session;

class ExamController extends Controller
{
    /**
     * Show reading form
     *
     * @param int $examId for exam
     *
     * @return \Illuminate\Http\Response
     */
    public function reading($examId)
    {
        $exam = Exam::findOrFail($examId);
        $questionsPart5 = Question::with('answers')
            ->where('exam_id', $exam->id)
            ->where('part_id', \App\Models\Part::PART_5)
            ->get();
        
        $summariesPart6 = Summary::whereHas('questions', function ($query) use ($exam) {
            return $query->where('exam_id', $exam->id)->where('part_id', \App\Models\Part::PART_6);
        })->with('questions', 'summaryable', 'questions.answers')->get();
        
        $summariesPart7 = Summary::whereHas('questions', function ($query) use ($exam) {
            return $query->where('exam_id', $exam->id)->where('part_id', \App\Models\Part::PART_7);
        })->with('questions', 'summaryable', 'questions.answers')->get();
        
        return view('frontend.exams.reading.index', compact('exam', 'examId', 'questionsPart5', 'summariesPart7', 'summariesPart6'));
    }

    /**
     * Post form reading test
     *
     * @param Request $request for post reading
     * @param int     $examId  for exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storeReading(Request $request, $examId)
    {
        $requestQuestion = $request->all();
        DB::transaction(function () use ($requestQuestion, $examId) {
            $userExam = new UserExam(['user_id'=>Auth()->user()->id,'exam_id'=>$examId]);
            $userExam->save();
            for ($i = (1+\App\Models\Part::NUMBER_QUESTION_LISTEN); $i <= (count($requestQuestion['answers'])+\App\Models\Part::NUMBER_QUESTION_LISTEN); $i++) {
                $userAnswer = new UserAnswer;
                $userAnswer->question_id = $requestQuestion['answers'][$i]['question'];
                $userAnswer->is_correct = (!empty($requestQuestion['answers'][$i]['correct']) ? $requestQuestion['answers'][$i]['correct'] :0);
                $userExam->userAnswers()->save($userAnswer);
            }
        });
        Session::flash('success', trans('messages.exam_test_success'));
        return redirect()->route('exam.results', $examId);
    }

    /**
     * Show Reults
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function resultExam($examId)
    {
        $exam = Exam::findorFail($examId);
        $userAnswerId = UserExam::where('user_id', Auth()->user()->id)->where('exam_id', $examId)->orderBy('id', 'DESC')->first()->id;
        $answerCorrects = UserAnswer::where('user_exam_id', $userAnswerId)->where('is_correct', \App\Models\Answer::IS_CORRECT)->get();
        
        $correctReading = 0;
        foreach ($answerCorrects as $answerCorrect) {
            $correctReading+= count($answerCorrect->question()->get()->wherein('part_id', [\App\Models\Part::PART_5,\App\Models\Part::PART_6,\App\Models\Part::PART_7]));
        }
        return view('frontend.exams.results.index', compact('correctReading', 'exam'));
    }
}
