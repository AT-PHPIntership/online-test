<?php
/**
 * Score for test exams
 *
 * @param int $score for exam
 *
 * @return int        score
 */
function getReadingScore($score)
{
    $configScores = config('reading_score');
    foreach ($configScores as $k => $v) {
        $scoreRange = explode('-', $k);
        if ($score >= (int) $scoreRange[0] && $score <= (int) $scoreRange[1]) {
            return call_user_func($v, $score);
        }
    }
}

/**
 * Get Score of test listening
 *
 * @param int $score of exam
 *
 * @return int        score
 */
function getListeningScore($score)
{
    $configScores = config('listening_score');
    foreach ($configScores as $k => $v) {
        $scoreRange = explode('-', $k);
        if ($score >= (int) $scoreRange[0] && $score <= (int) $scoreRange[1]) {
            return call_user_func($v, $score);
        }
    }
}
