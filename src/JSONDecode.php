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
* @copyright 2023 Raghuveer Dendukuri
*/

class JSONDecode {
	
	/**
	 * Returns true, when the given parameter is a valid JSON string.
	 */
	public function isJson($value) {
		try {
			
			if (!is_string($value)) {
				// A non-string value is never a Valid JSON string.
				return false;
				
			} else if (is_numeric($value)) { 
				// A numeric string in double quotes that is encapsulated in single quotes is a valid JSON string. Anything else is never a Valid JSON string.
				return false; 
				
			} else if (mb_strlen($value) < 2) { 
				// Any non-numeric JSON string must be longer than 2 characters, or else, it cannot be considered for next level of JSON string validation checks.
				return false;
				
			} else if ('null' === $value) { 
				// "null" is never a valid JSON string.
				return false;
				
			} else if ('true' === $value) { 
				// "true" is never a valid JSON string.
				return false;
				
			} else if ('false' === $value) { 
				// "false" is never a valid JSON string.
				return false;
				
			} else if ( '{' != $value[0] && '[' != $value[0] && '"' != $value[0] ) { 
				// Every JSON string has to be wrapped in {}, [] or "", if it is not, then that is never a Valid JSON string.
				return false;
				
			} else {
				//Actual JSON Decode operation using php's inbuilt json_decode function.
				$json = json_decode($value);
				return $json !== false && !is_null($json) && $value != $json;
				
			}
			
		} catch(JSONDecodeException $e) {
			
		  echo "\n JSONDecodeException - ", $e->getMessage(), (int)$e->getCode();
		  
		}
		
	}
	
	/**
	 * Returns if the input is a valid JSON string along with  type, when the given parameter is a valid JSON string.
	 */
	public function getJsonDecodedData($value, bool $asArray) {
		
		try {
			
			$response = [];
		
			if (!is_string($value)) {
				// A non-string value is never a Valid JSON string.
				
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else if (is_numeric($value)) { 
				// A numeric string in double quotes that is encapsulated in single quotes is a valid JSON string. Anything else is never a Valid JSON string.
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else if (mb_strlen($value) < 2) { 
				// Any non-numeric JSON string must be longer than 2 characters, or else, it cannot be considered for next level of JSON string validation checks.
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else if ('null' === $value) { 
				// "null" is never a valid JSON string.
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else if ('true' === $value) { 
				// "true" is never a valid JSON string.
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else if ('false' === $value) { 
				// "false" is never a valid JSON string.
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else if ( '{' != $value[0] && '[' != $value[0] && '"' != $value[0] ) { 
				// Every JSON string has to be wrapped in {}, [] or "", if it is not, then that is never a Valid JSON string.
				$response["is_json"] = false;
				$response["content"] = "";
				
				return $response;
				
			} else {
				//Actual JSON Decode operation using php's inbuilt json_decode function.
				
				if ($asArray === true) {
					
					$json = json_decode($value, true);
					
				} else {
					
					$json = json_decode($value);
					
				}
				
				if (($json !== false) && (!is_null($json)) && ($value != $json)) {
					
					$response["is_json"] = true;
					$response["content"] = $json;
					
					return $response;
					
				} else {
					
					$response["is_json"] = false;
					$response["content"] = "";
					
					return $response;
					
				}
			}
			
		} catch(JSONDecodeException $e) {
			
		  echo "\n JSONDecodeException - ", $e->getMessage(), (int)$e->getCode();
		  
		}
		
	}
	
	
}