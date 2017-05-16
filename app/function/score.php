<?php
/**
 * Score for listening
 *
 * @param int $score exam
 *
 * @return string
 */
function scoreListening($score)
{
    if ($score >= 0 && $score <= 6) {
        return 5;
    } elseif ($score >=7 && $score <= 30) {
        $point =  ($score*5 - 25);
        return $point;
    } elseif ($score >= 31 && $score <= 38) {
        $point =  ($score*5 -20);
        return $point;
    } elseif ($score >= 39 && $score <= 43) {
        $point = ($score*5 - 15);
        return $point;
    } elseif ($score >= 44 && $score <= 45) {
        $point = ($score*5 - 10);
        return $point;
    } elseif ($score >= 46 && $score <= 53) {
        $point = ($score*5 - 5 );
        return $point;
    } elseif ($score >= 54 && $score <= 57) {
        $point = ($score*5);
        return $point;
    } elseif ($score >= 58 && $score <= 69) {
        $point = $score*5 + 5;
        return $point;
    } elseif ($score >= 70 && $score <= 74) {
        $point = $score*5 + 10;
        return $point;
    } elseif ($score >= 75 && $score <= 79) {
        $point = $score*5 + 15;
        return $point;
    } elseif ($score >= 80 && $score <= 84) {
        $point = $score*5 + 20;
        return $point;
    } elseif ($score >= 85 && $score <= 87) {
        $point = $score*5 + 25;
        return $point;
    } elseif ($score >= 88 && $score <= 92) {
        $point = $score*5 + 30;
        return $point;
    } else {
        return 495;
    }
}
