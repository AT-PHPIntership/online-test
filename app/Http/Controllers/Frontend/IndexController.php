<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\News;
use App\Models\Category;

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
        $news = Category::with('news')->get();
        return view('frontend.index', compact('examsFinished', 'news'));
    }
}
