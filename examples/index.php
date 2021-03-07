<?php
require 'vendor/autoload.php';

use \EaseAppPHP\JSONDecode\JSONDecode;

$jsonDecode = new JSONDecode();

//$isJsonCheckInput = "{ 'bar': 'baz' }"; // bool(false)

//$isJsonCheckInput = '{ bar: "baz" }'; // bool(false)
 
//$isJsonCheckInput = '{ bar: "baz", }'; // bool(false)

$isJsonCheckInput = '{"a":5}'; // bool(true)

//$isJsonCheckInput = '[1,2,3]'; // bool(true)

//$isJsonCheckInput = '11111111111'; // bool(false)

//$isJsonCheckInput = '1.5'; // bool(false)

//$isJsonCheckInput = 'true'; // bool(false)

//$isJsonCheckInput = 'false'; // bool(false)

//$isJsonCheckInput = 'null'; // bool(false)

//$isJsonCheckInput = 'hello'; // bool(false)

//$isJsonCheckInput = ''; // bool(false)

//$isJsonCheckInput = '"hello"'; // bool(true)

//$isJsonCheckInput = 11111111111; // bool(false)

//$isJsonCheckInput = array(); // bool(false)

//$isJsonCheckInput = new stdClass; // bool(false)

//$isJsonCheckInput = '"42"'; // bool(true)

//$isJsonCheckInput = '42'; // bool(false)

echo "isJsonCheckInput: <br>";
var_dump($isJsonCheckInput);

echo "<br>=========================================================================<br>";

$isJsonCheckResult = $jsonDecode->isJson($isJsonCheckInput);

echo "<br>isJsonCheckResult: <br>";
var_dump($isJsonCheckResult);

echo "<br>=========================================================================<br>";
echo "Output is given as Array<br>";

echo "getJsonDecodedDataCheckResult: <br>";
$receivedData = $jsonDecode->getJsonDecodedData($isJsonCheckInput, true);
	
if (($receivedData["is_json"] === true) && ($receivedData["content"] != "")) {
	
	$data = $receivedData["content"];
	var_dump($data);
	
} else {
	
	var_dump($receivedData);
	
}
echo "<br>";

echo "<br>=========================================================================<br>";
echo "Output is given as Object<br>";

echo "getJsonDecodedDataCheckResult: <br>";
$receivedData = $jsonDecode->getJsonDecodedData($isJsonCheckInput, false);
	
if (($receivedData["is_json"] === true) && ($receivedData["content"] != "")) {
	
	$data = $receivedData["content"];
	var_dump($data);
	
} else {
	
	var_dump($receivedData);
	
}
echo "<br>";


?>
