<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Show detail news
     *
     * @param string $titleNews of news
     * @param int    $newsId    of news
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($titleNews, $newsId)
    {
        $news = News::findorFail($newsId);
        return view('frontend.news.detail', compact('news'));
    }
}
