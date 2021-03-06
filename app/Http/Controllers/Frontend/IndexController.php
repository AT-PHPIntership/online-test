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
        $news = News::orderBy('id', 'DESC')->paginate();
        return view('frontend.index', compact('news'));
    }
}
