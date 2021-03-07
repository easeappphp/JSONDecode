<?php

declare(strict_types=1);

namespace EaseAppPHP\JSONDecode;

use \EaseAppPHP\JSONDecode\Exceptions\JSONDecodeException;

/*
* Name: JSONDecode
*
* Author: Raghuveer Dendukuri
*
* Version: 1.0.3
*
* Description: This is to do json_decode operation only on valid json string and in a highly performing way.
*
* License: MIT
*
* @copyright 2021 Raghuveer Dendukuri
*/

class JSONDecode {
	
	/**
	 * Returns true, when the given parameter is a valid JSON string.
	 */
	public function isJson($value) {
		try {
			
			/**
			 * Considerations
			 * A non-string value is never a Valid JSON string.
			 * A numeric string in double quotes that is encapsulated in single quotes is a valid JSON string. Anything else is never a Valid JSON string.
			 * Any non-numeric JSON string must be longer than 2 characters, or else, it cannot be considered for next level of JSON string validation checks.
			 * "null" is never a valid JSON string.
			 * "true" is never a valid JSON string.
			 * "false" is never a valid JSON string.
			 * Every JSON string has to be wrapped in {}, [] or "", if it is not, then that is never a Valid JSON string.
			 */
			if ((!is_string($value)) || (is_numeric($value)) || (mb_strlen($value) < 2) || ('null' === $value) || ('true' === $value) || ('false' === $value) || ('{' != $value[0] && '[' != $value[0] && '"' != $value[0])) {
				
				return false;
				
			}
			
			//Actual JSON Decode operation using php's inbuilt json_decode function.
			$json = json_decode($value);
			
			if (($json !== false) && ($json !== null) && ($value != $json)) {
				
				return true;
				
			}
			
			return false;
			
		} catch(JSONDecodeException $e) {
			
		  echo "\n JSONDecodeException - ", htmlspecialchars($e->getMessage(), ENT_QUOTES), (int)$e->getCode();
		  
		}
		
	}
	
	/**
	 * Returns if the input is a valid JSON string along with  type, when the given parameter is a valid JSON string.
	 */
	public function getJsonDecodedData($value, bool $asArray) {
		
		try {
			
			$response = [];
			
			$response["is_json"] = false;
			$response["content"] = "";
				
			/**
			 * Considerations
			 * A non-string value is never a Valid JSON string.
			 * A numeric string in double quotes that is encapsulated in single quotes is a valid JSON string. Anything else is never a Valid JSON string.
			 * Any non-numeric JSON string must be longer than 2 characters, or else, it cannot be considered for next level of JSON string validation checks.
			 * "null" is never a valid JSON string.
			 * "true" is never a valid JSON string.
			 * "false" is never a valid JSON string.
			 * Every JSON string has to be wrapped in {}, [] or "", if it is not, then that is never a Valid JSON string.
			 */
			if ((!is_string($value)) || (is_numeric($value)) || (mb_strlen($value) < 2) || ('null' === $value) || ('true' === $value) || ('false' === $value) || ('{' != $value[0] && '[' != $value[0] && '"' != $value[0])) {
				
				return $response;
				
			}
			
			//Actual JSON Decode operation using php's inbuilt json_decode function.				
			if ($asArray === true) {
				
				$json = json_decode($value, true);
				
			} else {
				
				$json = json_decode($value);
				
			}
			
			if (($json !== false) && ($json !== null) && ($value != $json)) {
				
				$response["is_json"] = true;
				$response["content"] = $json;
				
				return $response;
				
			} else {
				
				return $response;
				
			}
			
		} catch(JSONDecodeException $e) {
			
		  echo "\n JSONDecodeException - ", htmlspecialchars($e->getMessage(), ENT_QUOTES), (int)$e->getCode();
		  
		}
		
	}
	
	
}