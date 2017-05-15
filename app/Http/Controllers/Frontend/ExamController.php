<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Part;
use App\Models\UserExam;
use App\Models\userAnswer;
use App\Models\SummaryImage;
use App\Models\QuestionGroup;
use App\Models\SummaryText;
use App\Models\Summary;
use DB;
use Session;

class ExamController extends Controller
{
    /**
     * showReadingTestForm for exam
     * @param  int $examId for exam
     * 
     * @return \Illuminate\Http\Response
     */
    public function showReadingTestForm($examId){
      $exam = Exam::findOrFail($examId);
      $questions = Question::with('summaries', 'summaries.summaryable')->where('exam_id', $exam->id)
        ->where('part_id', 6)
        ->get();

        $summaries = Summary::whereHas('questions', function($query) use($exam){
            return $query->where('exam_id', $exam->id)->where('part_id', 6);
        })->with('questions', 'summaryable','questions.answers')->get();
         // dd($summaries->toArray());
      // $part7 = Exam::findOrFail($examId)->questions->where('part_id','7');
      return view('frontend.exams.reading.index', compact('exam','examId','part5', 'part6','part7','summaries'));
    }

    public function upPart5(Request $request, $examId){
      $requestQuestion = $request->all();
      DB::transaction(function () use ($requestQuestion, $examId){
        $useExam = new UserExam(['user_id'=>1, 'exam_id'=>$examId]);
        $useExam->save();

        for($i = 1; $i <= count($requestQuestion['answers']); $i++){
          $userAnswer = new UserAnswer;
          $userAnswer->question_id = $requestQuestion['answers'][$i]['question'];
          $userAnswer->is_correct = $requestQuestion['answers'][$i]['correct'];
          $userAnswer->userAnswers()->save($userAnswer);
        }
      });
    }
}
