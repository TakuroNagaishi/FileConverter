<?php

require_once(__DIR__ . '/Lib/File.php');

const OUTPUT_FILE_PATH = __DIR__ . '/Storage/Outputs/';
const OUTPUT_FILE_PREFIX = 'testcase_';
const OUTPUT_FILE_EXTENSION = '.json';

$file = new File($argv[1]);

$values = $file->readAsCells();

$header = $values[0];
unset($values[0]);

$cases = count($values);
$suffix_length = strlen(strval($cases));

function padWithZero(string $str, int $len): string
{
    return str_pad($str, $len, '0', STR_PAD_LEFT);
}

foreach ($values as $ind => $value) {
    $rtn = array_combine($header, $value);
    $case = padWithZero($ind, $suffix_length);

    file_put_contents(OUTPUT_FILE_PATH . OUTPUT_FILE_PREFIX . $case . OUTPUT_FILE_EXTENSION, json_encode($rtn, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}
