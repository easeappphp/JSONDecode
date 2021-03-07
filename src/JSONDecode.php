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
			 * A non-string value is never a Valid JSON string.
			 */
			if (!is_string($value)) {
				
				return false;
				
			}
			
			/**
			 * A numeric string in double quotes that is encapsulated in single quotes is a valid JSON string. Anything else is never a Valid JSON string.
			 */
			if (is_numeric($value)) { 
				
				return false; 
				
			}
			
			/**
			 * Any non-numeric JSON string must be longer than 2 characters, or else, it cannot be considered for next level of JSON string validation checks.
			 */
			if (mb_strlen($value) < 2) { 
				
				return false;
				
			}
			
			/**
			 * "null" is never a valid JSON string.
			 */
			if ('null' === $value) { 
				
				return false;
				
			}
			
			/**
			 * "true" is never a valid JSON string.
			 */
			if ('true' === $value) { 
				
				return false;
				
			}
			
			/**
			 * "false" is never a valid JSON string.
			 */
			if ('false' === $value) { 
				
				return false;
				
			}
			
			/**
			 * Every JSON string has to be wrapped in {}, [] or "", if it is not, then that is never a Valid JSON string.
			 */
			if ('{' != $value[0] && '[' != $value[0] && '"' != $value[0]) { 
				
				return false;
				
			}
			
			/**
			 * Actual JSON Decode operation using php's inbuilt json_decode function.
			 */
			$json = $this->jsonDecodeData($value, false);
			
			if (($json !== false) && ($json !== null) && ($value != $json)) {
				
				return true;
				
			}
			
			return false;
			
		} catch(JSONDecodeException $e) {
			
		  echo htmlspecialchars("\n JSONDecodeException - ", $e->getMessage(), (int)$e->getCode(), ENT_QUOTES);
		  
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
			 * A non-string value is never a Valid JSON string.
			 */
			if (!is_string($value)) {
				
				return $response;
				
			}
			
			/**
			 * A numeric string in double quotes that is encapsulated in single quotes is a valid JSON string. Anything else is never a Valid JSON string.
			 */
			if (is_numeric($value)) { 
				
				return $response;
				
			}
			
			/**
			 * Any non-numeric JSON string must be longer than 2 characters, or else, it cannot be considered for next level of JSON string validation checks.
			 */
			if (mb_strlen($value) < 2) { 
				
				return $response;
				
			}
			
			/**
			 * "null" is never a valid JSON string.
			 */
			if ('null' === $value) { 
				
				return $response;
				
			}
			
			/**
			 * "true" is never a valid JSON string.
			 */
			if ('true' === $value) { 
				
				return $response;
				
			}
			
			/**
			 * "false" is never a valid JSON string.
			 */
			if ('false' === $value) { 
				
				return $response;
				
			}
			
			/**
			 * Every JSON string has to be wrapped in {}, [] or "", if it is not, then that is never a Valid JSON string.
			 */
			if ('{' != $value[0] && '[' != $value[0] && '"' != $value[0]) { 
				
				return $response;
				
			}
			
			/**
			 * Actual JSON Decode operation using php's inbuilt json_decode function.
			 */
			$json = $this->jsonDecodeData($value, $asArray);
			
			if (($json !== false) && ($json !== null) && ($value != $json)) {
				
				$response["is_json"] = true;
				$response["content"] = $json;
				
				return $response;
				
			}
				
			return $response;
			
		} catch(JSONDecodeException $e) {
			
		  echo htmlspecialchars("\n JSONDecodeException - ", $e->getMessage(), (int)$e->getCode(), ENT_QUOTES);
		  
		}
		
	}
	
	/**
	 * Returns JSon Decoded data
	 */
	private function jsonDecodeData($jsonString, bool $asArray) {
		
		try {
			
			if ($asArray === true) {
				
				$response = json_decode($jsonString, true);
				
				return $response;
				
			}

			if ($asArray === false) {
				
				$response = json_decode($jsonString);
				
				return $response;
				
			}
			
		} catch(JSONDecodeException $e) {
			
		  echo htmlspecialchars("\n JSONDecodeException - ", $e->getMessage(), (int)$e->getCode(), ENT_QUOTES);
		  
		}
		
	}
	
	
}