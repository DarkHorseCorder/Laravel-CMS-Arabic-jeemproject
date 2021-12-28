<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function showDate($date)
{
    return Carbon::parse($date)->format('j \/ m \/ Y');
}

function getWordCount($text)
{
    return str_word_count($text);
}

function getFirstParagraph($html){
    $start = strpos($html, '<p>');
    $end = strpos($html, '</p>', $start);
    $paragraph = substr($html, $start, $end-$start+4);
    return html_entity_decode(strip_tags($paragraph));
}

function getEstimateReadingTime($body)
{
    Str::macro('readDuration', function(...$text) {
        $totalWords = str_word_count(implode(" ", $text));
        $minutesToRead = round($totalWords / 200);

        return (int)max(1, $minutesToRead);
    });

    return Str::readDuration($body). ' min to read';
}


// function showDateTime($date)
// {
//     return Carbon::parse($date)->format('jS \of F Y \a\t h:i A');
// }

// function showDateTimeDay($date)
// {
//     return Carbon::parse($date)->format('\(l\)  jS \of F Y \a\t h:i:s A');
// }

