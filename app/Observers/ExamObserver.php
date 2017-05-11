<?php

namespace App\Observers;

use App\Models\Exam;

class ExamObserver
{
    /**
     * Listen to the User created event.
     *
     * @param Exam $exams of exams
     *
     * @return void
     */
    public function creating(Exam $exams)
    {
        $exams->count_test = 0;
        $exams->finished_part = 0;
    }
}
