<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Part;
use App\Models\QuestionImage;
use App\Models\SummaryImage;
use App\Models\QuestionGroup;
use App\Models\SummaryText;
use App\Models\Summary;
use App\Http\Requests\Backend\PostPart1Request;
use App\Http\Requests\Backend\Part2Request;
use App\Http\Requests\Backend\Part3Request;
use App\Http\Requests\Backend\PostPart4Request;
use App\Http\Requests\Backend\PostPart5Request;
use App\Http\Requests\Backend\PostPart6Request;
use App\Http\Requests\Backend\PostPart7Request;
use Session;
use DB;

class QuestionController extends Controller
{
    /**
     * [check description]
     * @param  [type] $examId [description]
     * @param  [type] $partId [description]
     * @return [type]         [description]
     */
    public function check($examId, $partId) {
        $exam = Exam::findOrFail($examId);
        if($exam){
            if($exam->is_finished === 0) {
                     $questions = Question::where('exam_id', $examId);
            if($partId > 1 && $questions->where('part_id', ($partId-1))->count()  === 0) {
                    return redirect()->route('admin.questions.create.part'.($partId-1), $examId);
                }
                if($questions->where('part_id', $partId)->count()  !== 0) {
                    return redirect()->route('admin.questions.create.part'.($partId+1), $examId);
                } else {
                    return view('backend.questions.create.part'.$partId, compact('exam'));
                }  
            }
            return 'finished';
        }
    }

    /**
     * Show the form for create the part 1 question
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart1($examId)
    {
        return $this->check($examId, 1);
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
        return redirect()->route('admin.questions.create.part2', $examId);
    }

     /**
     * Show the form for setup part 2 exam the specified resource.
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart2($examId)
    {
        return $this->check($examId, 2);
    }

     /**
     * Create a new part 2 for exam
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart2(Part2Request $request, $examId)
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
        return redirect()->route('admin.questions.create.part3', $examId);
    }

    /**
     * Show the form for setup part 3 exam the specified resource.
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart3($examId)
    {
        return $this->check($examId, 3);
    }

    /**
     * Create a new part 3 for exam
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart3(Part3Request $request, $examId)
    {
        $requestQuestion = $request->all();
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
        return redirect()->route('admin.questions.create.part4', $examId);
    }

    /**
     * Show the form for create the part 4 question
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart4($examId)
    {
        return $this->check($examId, 4);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart4(PostPart4Request $request, $examId)
    {
        $requestQuestions = $request->all();
        DB::transaction(function () use ($requestQuestions, $examId) {
            for ($i = 1; $i <= count($requestQuestions['question']); $i++) {
                $question = new Question;
                $question->exam_id = $examId;
                $question->content = $requestQuestions['question'][$i]['content'];
                $question->part_id = \App\Models\Part::PART_4;
                $question->save();

                for ($j = 0; $j< \App\Models\Answer::NUMBER_ANSWER_4; $j++) {
                    $answer = new Answer;
                    $answer->content = $requestQuestions['question'][$i]['answer'][$j];
                    if ($requestQuestions['question'][$i]['correct'] == $j) {
                        $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                    } else {
                        $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                    }
                    $question->answers()->save($answer);
                }
            }
        });
        Session::flash('success', trans('messages.part4_create_success'));
        return redirect()->route('admin.questions.create.part5', $examId);
    }
    
    /**
     * Show the form for create the part 5 question
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
    */
    public function createPart5($examId)
    {
        $exam = Exam::findOrFail($examId);
        return view('backend.questions.create.part5', compact('exam'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart5(PostPart5Request $request, $examId)
    {
        $requestQuestions = $request->all();
        DB::transaction(function () use ($requestQuestions, $examId) {
            for ($i = 1; $i <= count($requestQuestions['question']); $i++) {
                $question = new Question;
                $question->exam_id = $examId;
                $question->content = $requestQuestions['question'][$i]['content'];
                $question->part_id = \App\Models\Part::PART_5;
                $question->save();

                for ($j = 0; $j< \App\Models\Answer::NUMBER_ANSWER_4; $j++) {
                    $answer = new Answer;
                    $answer->content = $requestQuestions['question'][$i]['answer'][$j];
                    if ($requestQuestions['question'][$i]['correct'] == $j) {
                        $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                    } else {
                        $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                    }
                    $question->answers()->save($answer);
                }
            }
        });
        Session::flash('success', trans('messages.part5_create_success'));
        return redirect()->route('admin.questions.create.part6', $examId);
    }

    /**
     * Show the form for create the part 6 question
     *
     * @param int $examId of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function createPart6($examId)
    {
        $exam = Exam::findOrFail($examId);
        return view('backend.questions.create.part6', compact('exam'));
    }

     /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request of exams
    * @param int                      $examId  of exam
    *
    * @return \Illuminate\Http\Response
    */
    public function storePart6(PostPart6Request $request, $examId)
    {
        $requestQuestion = $request->all();
        DB::transaction(function () use ($requestQuestion, $examId) {
            foreach ($requestQuestion['group'] as $group) {
                $questionIds = [];
                foreach ($group['question'] as $questionNumber => $questionParams) {
                    $question = new Question;
                    $question->exam_id = $examId;
                    $question->part_id = \App\Models\Part::PART_6;
                    $question->save();
                    foreach ($questionParams['answer'] as $answerNumber => $answerParams) {
                        $answer = new Answer;
                        $answer->content = $answerParams;
                        $correctAnswer = !empty($group['question'][$questionNumber]['correct']) ? $group['question'][$questionNumber]['correct'] : null;
                        if ($answerNumber == $correctAnswer) {
                            $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                        } else {
                            $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                        }
                        $question->answers()->save($answer);
                    }
                     $questionIds[] = $question->id;
                }
                $summaryText = new SummaryText(['content' => $group['content']]);
                $summaryText->save();
                $summary = new Summary(['summaryable_id' => $summaryText->id, 'summaryable_type' => SummaryText::class]);
                $summary->save();
                $summary->questions()->attach($questionIds);
            }
        });
        Session::flash('success', trans('messages.part6_create_success'));
        return redirect()->route('admin.questions.create.part7', $examId);
    }
    
     /**
     * Show the form for create the part 7 question
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
    
     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart7(PostPart7Request $request, $examId)
    {
        $requestQuestions = $request->all();
        DB::transaction(function () use ($requestQuestions, $examId) {
            for ($i = 1; $i <= count($requestQuestions['questions']); $i++) {
                $summaryImage = new SummaryImage;
                $summaryImage->image = $requestQuestions['questions'][$i]['image']->hashName();
                $requestQuestions['questions'][$i]['image']->move(config('constant.upload_questions_img'), $requestQuestions['questions'][$i]['image']->hashName());
                $summaryImage->save();

                $summary = new Summary();
                $summary = $summaryImage->summaries()->save($summary);

                for ($j = 1; $j<=count($requestQuestions['questions'][$i]['content']['question']); $j++) {
                    $question = new Question;
                    $question->content = $requestQuestions['questions'][$i]['content']['question'][$j];
                    $question->exam_id = $examId;
                    $question->part_id = \App\Models\Part::PART_7;
                    $question->save();

                    for ($k = 0; $k< \App\Models\Answer::NUMBER_ANSWER_4; $k++) {
                        $answer = new Answer;
                        $answer->content =  $requestQuestions['questions'][$i]['content']['answer'][$j][$k];
                        if ($requestQuestions['questions'][$i]['content']['correct'][$j] == $k) {
                            $answer->is_correct = \App\Models\Answer::IS_CORRECT;
                        } else {
                            $answer->is_correct = \App\Models\Answer::NOT_CORRECT;
                        }
                        $question->answers()->save($answer);
                    }

                    $questionGroup = new QuestionGroup(['summary_id' => $summary->id]);
                    $question->summaries()->save($questionGroup);
                }
            }
            Exam::findorFail($examId)->update(['is_finished'=>\App\Models\Exam::FINISHED]);
        });
        Session::flash('success', trans('messages.part7_create_success'));
        return redirect()->route('admin.exams.index');
    }
}
