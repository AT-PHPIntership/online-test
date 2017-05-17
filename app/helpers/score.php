<?php
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
