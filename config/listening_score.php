<?php
return [
    '0-6' => function ($score) {
        return 5;
    },
    '7-30' => function ($score) {
        return $score*5 - 25;
    },
    '31-38' => function ($score) {
        return  $score*5 - 20;
    },
    '39-43' => function ($score) {
        return  $score*5 - 15;
    },
    '44-45' => function ($score) {
        return  $score*5 - 10;
    },
    '46-53' => function ($score) {
        return  $score*5 - 5;
    },
    '54-57' => function ($score) {
        return  $score*5;
    },
    '58-69' => function ($score) {
        return  $score*5 + 5;
    },
    '70-74' => function ($score) {
        return  $score*5 + 10;
    },
    '75-79' => function ($score) {
        return  $score*5 + 15;
    },
    '80-84' => function ($score) {
        return  $score*5 + 20;
    },
    '85-87' => function ($score) {
        return  $score*5 + 25;
    },
    '88-92' => function ($score) {
        return  $score*5 + 30;
    },
    '93-100' => function ($score) {
        return  495;
    },
];
