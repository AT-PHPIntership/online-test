<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;

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
        return view('frontend.index', compact('examsFinished'));
    }
}
