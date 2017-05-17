<?php
return [
    '0-9' => function ($score) {
        return 5;
    },
    '10-24' => function ($score) {
        return $score*5 - 40;
    },
    '25-27' => function ($score) {
        return  $score*5 - 35;
    },
    '28-38' => function ($score) {
        return  $score*5 - 30;
    },
    '39-42' => function ($score) {
        return  $score*5 - 25;
    },
    '43-46' => function ($score) {
        return  $score*5 - 20;
    },
    '47-51' => function ($score) {
        return  $score*5 - 15;
    },
    '52-54' => function ($score) {
        return  $score*5 - 10;
    },
    '55-63' => function ($score) {
        return  $score*5 - 5;
    },
    '64-81' => function ($score) {
        return  $score*5;
    },
    '82' => function ($score) {
        return  405;
    },
    '83-88' => function ($score) {
        return  $score*5 - 5;
    },
    '89-91' => function ($score) {
        return  $score*5;
    },
    '92-93' => function ($score) {
        return $score*5 + 5;
    },
    '94-96' => function ($score) {
        return $score*5 + 10;
    },
    '97-100' => function ($score) {
        return  495;
    },
];
