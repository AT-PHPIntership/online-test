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
use App\Http\Requests\Backend\PostPart4AndPart5Request;
use App\Http\Requests\Backend\PostPart6Request;
use App\Http\Requests\Backend\PostPart7Request;
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
        return $this->createPart($examId, \App\Models\Exam::NOT_FINISHED);
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
        return $this->storepart($examId, $request, \App\Models\Part::PART_1);
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
        return $this->createPart($examId, \App\Models\Exam::FINISHED_PART_1);
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
        return $this->storepart($examId, $request, \App\Models\Part::PART_2);
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
        return $this->createPart($examId, \App\Models\Exam::FINISHED_PART_2);
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
        return $this->storepart($examId, $request, \App\Models\Part::PART_3);
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
        return $this->createPart($examId, \App\Models\Exam::FINISHED_PART_3);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart4(PostPart4AndPart5Request $request, $examId)
    {
        return $this->storepart($examId, $request, \App\Models\Part::PART_4);
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
        return $this->createPart($examId, \App\Models\Exam::FINISHED_PART_4);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of exams
     * @param int                      $examId  of exam
     *
     * @return \Illuminate\Http\Response
     */
    public function storePart5(PostPart4AndPart5Request $request, $examId)
    {
        return $this->storepart($examId, $request, \App\Models\Part::PART_5);
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
        return $this->createPart($examId, \App\Models\Exam::FINISHED_PART_5);
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
            Exam::findorFail($examId)->update(['finished_part'=>\App\Models\Exam::FINISHED_PART_6]);
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
        return $this->createPart($examId, \App\Models\Exam::FINISHED_PART_6);
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
            Exam::findorFail($examId)->update(['finished_part'=>\App\Models\Exam::FINISHED_PART_7]);
        });
        Session::flash('success', trans('messages.part7_create_success'));
        return redirect()->route('admin.exams.index');
    }

    /**
     * Show the form for create the part question
     *
     * @param int     $examId       The exam identifier
     * @param integer $finishedPart The finished part
     *
     *  @return \Illuminate\Http\Response
     */
    public function createPart($examId, $finishedPart)
    {
        $exam = Exam::findOrFail($examId);
        if ($exam->finished_part == \App\Models\Exam::FINISHED_PART_7) {
            return redirect()->route('admin.exams.index');
        } elseif ($exam->finished_part == $finishedPart) {
            return view('backend.questions.create.part'.($finishedPart+1), compact('exam'));
        } else {
            return redirect()->route('admin.questions.create.part'.($exam->finished_part+1), $examId);
        }
    }
    
    /**
     * Storepart 1 to part 5
     *
     * @param int     $examId  of exam
     * @param request $request of
     * @param id      $partId  of part
     *
     * @return \Illuminate\Http\Response
     */
    public function storepart($examId, $request, $partId)
    {
        $requestQuestions = $request->all();
        DB::transaction(function () use ($requestQuestions, $examId, $partId) {
            for ($i = 1; $i <= count($requestQuestions['question']); $i++) {
                $question = new Question;
                $question->exam_id = $examId;
                $question->content = ($partId == \App\Models\Part::PART_1 || $partId == \App\Models\Part::PART_2 ? null : $requestQuestions['question'][$i]['content']);
                $question->part_id = $partId;
                $question->save();

                if ($question->part_id == 1) {
                    $questionImage = new QuestionImage;
                    $requestQuestionsI = $requestQuestions['question'][$i];
                    $questionImage->image = $requestQuestionsI['image']->hashName();
                    $requestQuestionsI['image']->move(config('constant.upload_questions_img'), $requestQuestionsI['image']->hashName());
                    $question->questionImage()->save($questionImage);
                }
                $this->createAnswer($requestQuestions['question'][$i], $question);
            }
            Exam::findorFail($examId)->update(['finished_part'=>$partId]);
        });
        Session::flash('success', trans('messages.part'.$partId.'_create_success'));
        return redirect()->route('admin.questions.create.part'.($partId+1), $examId);
    }
    
    /**
     * Insert table answer
     *
     * @param request  $requestQuestions of form
     * @param response $question         of question
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnswer($requestQuestions, $question)
    {
        for ($j = 0; $j< ($question->part_id == \App\Models\Part::PART_2 ? \App\Models\Answer::NUMBER_ANSWER_3 : \App\Models\Answer::NUMBER_ANSWER_4); $j++) {
            $answer = new Answer;
            $answer->content = ($question->part_id == \App\Models\Part::PART_1 || $question->part_id  == \App\Models\Part::PART_2 ? null : $requestQuestions['answer'][$j]);
            $answer->is_correct = ($requestQuestions['correct'] == $j ? \App\Models\Answer::IS_CORRECT : \App\Models\Answer::NOT_CORRECT );
            $question->answers()->save($answer);
        }
    }
}
