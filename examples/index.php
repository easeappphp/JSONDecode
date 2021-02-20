<?php
require '../vendor/autoload.php';

use \EaseAppPHP\JSONDecode\JSONDecode;

$jsonDecode = new JSONDecode();

var_dump($jsonDecode->isJson("{ 'bar': 'baz' }")); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('{ bar: "baz" }')); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('{ bar: "baz", }')); // bool(false) - CORRECT
echo "<br>";

var_dump($jsonDecode->isJson('{"a":5}')); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('[1,2,3]')); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('11111111111')); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->isJson('1.5')); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->isJson('true')); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->isJson('false')); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('null')); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->isJson('hello')); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('')); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('"hello"')); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson(11111111111)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson(array())); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson(new stdClass)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('"42"')); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->isJson('42')); // bool(false) - CORRECT
echo "<br>";

echo "=========================================================================<br>";

var_dump($jsonDecode->getJsonDecodedData("{ 'bar': 'baz' }", true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('{ bar: "baz" }', true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('{ bar: "baz", }', true)); // bool(false) - CORRECT
echo "<br>";

var_dump($jsonDecode->getJsonDecodedData('{"a":5}', true)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('[1,2,3]', true)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('11111111111', true)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('1.5', true)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('true', true)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('false', true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('null', true)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('hello', true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('', true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('"hello"', true)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData(11111111111, true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData(array(), true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData(new stdClass, true)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('"42"', true)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('42', true)); // bool(false) - CORRECT
echo "<br>";

echo "=========================================================================<br>";

var_dump($jsonDecode->getJsonDecodedData("{ 'bar': 'baz' }", false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('{ bar: "baz" }', false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('{ bar: "baz", }', false)); // bool(false) - CORRECT
echo "<br>";

var_dump($jsonDecode->getJsonDecodedData('{"a":5}', false)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('[1,2,3]', false)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('11111111111', false)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('1.5', false)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('true', false)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('false', false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('null', false)); // bool(false) - CORRECTED
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('hello', false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('', false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('"hello"', false)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData(11111111111, false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData(array(), false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData(new stdClass, false)); // bool(false) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('"42"', false)); // bool(true) - CORRECT
echo "<br>";
var_dump($jsonDecode->getJsonDecodedData('42', false)); // bool(false) - CORRECT
echo "<br>";

?>
