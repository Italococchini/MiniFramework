<?php namespace Library;

class curl {

	private static $ch = NULL;

	private static $domain = "http://mini.git/create";

	private static $VERSION = "VR v2 PHP SDK v1.0.0";

	public static function get( $request = array() ){

		self::$ch = curl_init();
		$headers = ["Content-Type: application/json"]; 
		curl_setopt(self::$ch, CURLOPT_USERAGENT, self::$VERSION);
		curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(self::$ch, CURLOPT_HTTPHEADER, $headers);
//		curl_setopt(self::$ch, CURLOPT_TIMEOUT, 30); // 30-second timeout, adjust to taste
//		curl_setopt(self::$ch, CURLOPT_POST, !empty($values)); 
		
//		$uri = self::getDomain() . $endpoint;
		curl_setopt(self::$ch, CURLOPT_URL, self::$domain);
		
		if (!empty($values)) {
			curl_setopt(self::$ch, CURLOPT_POSTFIELDS, json_encode($values));
		}
		
		$raw = curl_exec(self::$ch);
		if ($errno = curl_errno(self::$ch)) {
			if ($errno == CURLE_OPERATION_TIMEOUTED) {
				// error
			}
			// error
		}
		$result = json_decode($raw);
		$httpCode = curl_getinfo(self::$ch, CURLINFO_HTTP_CODE);
		if ($httpCode >= 400) {
			if (!isset($result->error_code)) {

			}
			if ($httpCode >= 500) {
				
			}
		}

		return $result;

	}

}