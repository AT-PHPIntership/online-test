<?php

namespace App\Observers;

use App\Models\News;
use Auth;

class NewsObserver
{
    /**
     * Listen to the News created event.
     *
     * @param Exam $news of news
     *
     * @return void
     */
    public function creating(News $news)
    {
        if (!Auth::guest()) {
            $news ->admin_user_id = Auth()->user()->id;
        }
        $news ->slug = str_slug($news->title);
    }

    /**
     * Listen to the News updated event.
     *
     * @param Exam $news of news
     *
     * @return void
     */
    public function updating(News $news)
    {
        $news ->slug = str_slug($news->title);
    }
}
