<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Exam;

class ExamComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view of view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('exams', Exam::orderBy('id', 'DESC')->limit(7)->get());
    }
}
