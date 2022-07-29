<?php

require_once(__DIR__ . '/Lib/File.php');

const OUTPUT_FILE_PATH = __DIR__ . '/Storage/Outputs/';
const OUTPUT_FILE_PREFIX = 'testcase_';
const OUTPUT_FILE_EXTENSION = '.json';


$input_file_path = $argv[1];

$file = new File($input_file_path);

$values = $file->readAsCells();

$header = $values[0];
unset($values[0]);

foreach ($values as $ind => $value) {
    $rtn = array_combine($header, $value);
    file_put_contents(OUTPUT_FILE_PATH . OUTPUT_FILE_PREFIX . $ind . OUTPUT_FILE_EXTENSION, json_encode($rtn, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}
