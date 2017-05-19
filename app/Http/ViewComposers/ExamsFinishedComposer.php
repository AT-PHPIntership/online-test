<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Exam;

class ExamsFinishedComposer
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
        $view->with('examsFinished', Exam::where('finished_part', \App\Models\Part::PART_7)->get());
    }
}
