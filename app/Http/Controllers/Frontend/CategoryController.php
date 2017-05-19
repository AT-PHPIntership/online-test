<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Exam;

class CategoryController extends Controller
{
    /**
     * Show page index
     *
     * @param int $id category
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('category_id', '=', $id)->paginate();
        return view('frontend.index', compact('news'));
    }
}
