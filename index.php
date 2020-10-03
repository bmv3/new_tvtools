<?php

require "./classes/Parser.php";
require "./classes/TextPrepare.php";
require "./classes/CompileText.php";



$text = (new TextPrepare('08.txt'))->getText();

$text_container = new Parser($text);

$compiler = new CompileText($text_container);
$text = $compiler->getText();

var_dump($text);
