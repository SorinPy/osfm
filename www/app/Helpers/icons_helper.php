<?php


function icon($name,$config = []){
    $base_url = base_url();
    $size = $config["size"] ?? 1;
    $class = $config["class"] ?? "";

    $template = "
    <svg class=\"bi {$class}\" width=\"{$size}em\" height=\"{$size}em\" fill=\"currentColor\">
        <use xlink:href=\"{$base_url}/images/bootstrap-icons.svg#{$name}\"/>
    </svg>";
    return $template;
}