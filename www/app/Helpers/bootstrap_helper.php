<?php


function invalid_feedback($text) {

    return $text === null ? "" : "<div class='invalid-feedback'>{$text}</div>";
}