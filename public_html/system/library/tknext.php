<?php

class TkNext {
	
	static $appId;
	
	static $appSecret;
	
	const METHOD_GET = 'GET';
	
	const METHOD_POST = 'POST';
	
	private static $registry = NULL;
	private static $config = NULL;
	private static $log = NULL;

	public function __construct($registry) {

		if (self::$registry === NULL) {
			self::$registry = $registry;
		}
		
		if (self::$config === NULL) {
			self::$config = $registry->get('config');
		}
		
		if (self::$log === NULL) {
			self::$log = $registry->get('log');
		}
		
	}
	
	public static function getDefault($iso_code_2) {
		
		if ($iso_code_2 == 'RO') {
			$data['postcode'] = '010011';
			$data['city'] = 'BUCURESTI';
			$data['office_id'] = '20003';
			$data['country'] = 'Romania';
		} else if ($iso_code_2 == 'GR') {
			$data['postcode'] = '10431';
			$data['city'] = 'ATHINA';
			$data['office_id'] = '1689';
			$data['country'] = 'Greece';
		} else if ($iso_code_2 == 'HR') {
			$data['postcode'] = '10000';
			$data['city'] = 'Zagreb';
			$data['office_id'] = '1';
			$data['country'] = 'Hrvatska';
		} else if ($iso_code_2 == 'SI') {
			$data['postcode'] = '1000';
			$data['city'] = 'Ljubljana';
			$data['office_id'] = 'SI1000-MOL02';
			$data['country'] = 'Slovenia';
		} else if ($iso_code_2 == 'HU') {
			$data['postcode'] = '1011';
			$data['city'] = 'Budapest';
			$data['office_id'] = '1011-ALPHAZOOKF';
			$data['country'] = 'Hungary';
		} else if ($iso_code_2 == 'SK') {
			$data['postcode'] = '81104';
			$data['city'] = 'Bratislava';
			$data['office_id'] = 'SK81104-PLOCKER001';
			$data['country'] = 'Slovakia';
		} else if ($iso_code_2 == 'CZ') {
			$data['postcode'] = '10100';
			$data['city'] = 'Praha';
			$data['office_id'] = '10100-PREMYSLOND';
			$data['country'] = 'Czech Republic';
		} else if ($iso_code_2 == 'PL') {
			$data['postcode'] = '00-001';
			$data['city'] = 'WARSZAWA';
			$data['office_id'] = '10000';
			$data['country'] = 'Poland';
		} else {
			$data['postcode'] = '1000';
			$data['city'] = 'София';
			$data['office_id'] = '4878';
			$data['country'] = 'България';
		}

		return $data;
	}
	
	public static function setAuth($appId, $appSecret) {
		
		self::$appId = $appId;
		self::$appSecret = $appSecret;
	}
	
	/**
	 * @throws Exception
	 */
	public static function getShipment($id) {
		
		return self::request(self::METHOD_GET, 'shipments/' . $id);
	}
	
	/**
	 * @throws Exception
	 */
	public static function createShipment($data) {
		
		return self::request(self::METHOD_POST, 'shipments', $data);
	}
	
	/**
	 * @throws Exception
	 */
	public static function printShipment($id) {
		
		return self::request(self::METHOD_POST, "shipments/" . $id . "/print", ['id' => $id]);
	}
	
	/**
	 * @throws Exception
	 */
	public static function cancelShipment($id) {
		
		return self::request(self::METHOD_POST, "shipments/" . $id . "/cancel");
	}
	
	/**
	 * @throws Exception
	 */
	public static function trackShipments($ids) {
		
		return self::request(self::METHOD_POST, "shipments/track", ['ids' => $ids]);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getOffice($id) {
		
		return self::request(self::METHOD_GET, "offices/" . $id);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getOffices($data) {
		
		$url = '';
		foreach ($data as $key => $value) {
			if ($url) {
				$url .= '&' . $key . '=' . $value;
			} else {
				$url .= '?' . $key . '=' . $value;
			}
		}
		
		return self::request(self::METHOD_GET, "offices" . $url);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getStreets($data) {
		
		$url = '';
		foreach ($data as $key => $value) {
			if ($url) {
				$url .= '&' . $key . '=' . $value;
			} else {
				$url .= '?' . $key . '=' . $value;
			}
		}
		
		return self::request(self::METHOD_GET, "streets" . $url);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getCities($data) {
		
		$url = '';
		foreach ($data as $key => $value) {
			if ($url) {
				$url .= '&' . $key . '=' . $value;
			} else {
				$url .= '?' . $key . '=' . $value;
			}
		}
		
		return self::request(self::METHOD_GET, "cities" . $url);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getCountries() {
		
		return self::request(self::METHOD_GET, "countries");
	}
	
	/**
	 * @throws Exception
	 */
	public static function getCalculate($data) {
		
		return self::request(self::METHOD_POST, 'shipments/calculate', $data);
	}
	
	/**
	 * @throws Exception
	 */
	private static function request($method, $endpoint, $data = array()) {
		
		if (empty(self::$appId) || empty(self::$appSecret)) {
			$result['message'] = 'App ID or App secret is missing.';
		}
		
		$ch = curl_init();
		
		curl_setopt_array($ch, array(
			CURLOPT_URL            => 'https://api.nextlevel.delivery/v1/' . $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLINFO_HEADER_OUT    => true,
			CURLOPT_HEADER         => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)',
			CURLOPT_CONNECTTIMEOUT => 3,
			CURLOPT_TIMEOUT        => 20,
			CURLOPT_HTTPHEADER     => [
				'app-id: ' . self::$appId,
				'app-secret: ' . self::$appSecret,
				'content-type: application/json'
			]
		));
		
		if ($method === self::METHOD_POST) {
			curl_setopt($ch, CURLOPT_POST, true);
			
			if (!empty($data)) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			}
		}
		
		$response = curl_exec($ch);
		$statusCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
		$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
		
		if($contentType == 'application/pdf'){
			$result = $response;
		} else {
			$result = json_decode($response, true);
		}
		
		
		if ($contentType === 'application/json') {
			if (!empty($result['error'])) {
				$result['message'] = $result['error']['code'] . ' - ' . $result['error']['message'] . ": https://api.nextlevel.delivery/v1/" . $endpoint;
			} else if ($statusCode >= 400) {
				$result['message'] = "Invalid response.";
			}
		} else if ($statusCode >= 400) {
			$result['message'] = "Invalid response.";
		}
		
		curl_close($ch);

		if (self::$config->get('module_tk_checkout_debug')) {
			self::$log->write('NextLevel:');
			self::$log->write('https://api.nextlevel.delivery/v1/' . $endpoint);
			self::$log->write('appId:');
			self::$log->write(self::$appId);
			self::$log->write('appSecret:');
			self::$log->write(self::$appSecret);
			if (!empty($data)) {
				self::$log->write('data:');
				self::$log->write($data);
			}
			self::$log->write('statusCode:');
			self::$log->write($statusCode);
			self::$log->write('result:');
			self::$log->write($result);
		}
		
		return $result;
	}
}