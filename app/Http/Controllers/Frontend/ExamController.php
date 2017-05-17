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
     * Show form test online
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function listening($examId)
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
        $exam = Exam::with($with)->findorFail($examId);
        return view('frontend.exams.listening.listening', compact('exam'));
    }

    /**
     * Store test online
     *
     * @param Request $request of request
     * @param int     $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storeListening(Request $request, $examId)
    {
        $requestQuestion = $request->all();
        DB::transaction(function () use ($requestQuestion, $examId) {

            $userExam = new UserExam(['user_id'=>Auth()->user()->id,'exam_id'=>$examId]);
            $userExam->save();

            for ($i = 1; $i <= count($requestQuestion['answers']); $i++) {
                $userAnswer = new UserAnswer;
                $userAnswer->question_id = $requestQuestion['answers'][$i]['question'];
                $userAnswer->is_correct = (!empty($requestQuestion['answers'][$i]['correct']) ? $requestQuestion['answers'][$i]['correct'] :0);
                $userExam->userAnswers()->save($userAnswer);
            }
        });
        Session::flash('success', trans('messages.exam_test_success'));
        return redirect()->route('exam.reading', $examId);
    }

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
        
        return view('frontend.exams.reading.reading', compact('exam', 'examId', 'questionsPart5', 'summariesPart7', 'summariesPart6'));
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
            Exam::findOrFail($examId)->increment('count_test');
        });
        Session::flash('success', trans('messages.exam_test_success'));
        return redirect()->route('result.test', $examId);
    }

    /**
     * Show resultTest
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function resultTest($examId)
    {
        $exam = Exam::findorFail($examId);
        $userAnswerId = UserExam::where('user_id', Auth()->user()->id)->where('exam_id', $examId)->orderBy('id', 'DESC')->first()->id;
        $correctAnswers = UserAnswer::where('user_exam_id', $userAnswerId)->where('is_correct', \App\Models\Answer::IS_CORRECT)->get();
        
        $correctListening = 0;
        $correctReading = 0;
        foreach ($correctAnswers as $correctAnswer) {
            $correctReading+= count($correctAnswer->question()->get()->wherein('part_id', [\App\Models\Part::PART_5,\App\Models\Part::PART_6,\App\Models\Part::PART_7]));
            $correctListening+= count($correctAnswer->question()->get()->wherein('part_id', [\App\Models\Part::PART_1,\App\Models\Part::PART_2,\App\Models\Part::PART_3,\App\Models\Part::PART_4]));
        }
        return view('frontend.exams.result', compact('correctListening', 'correctReading', 'exam'));
    }
}
