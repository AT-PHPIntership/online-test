<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\News;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examsFinished = Exam::where('finished_part', \App\Models\Part::PART_7)->get();
        $news = News::orderBy('id', 'DESC')->paginate();
        return view('frontend.index', compact('examsFinished', 'news'));
    }
}
