<?php

class TkSameday {
	
	const METHOD_GET = 'GET';
	
	const METHOD_POST = 'POST';
	
	const METHOD_DELETE = 'DELETE';
	
	private static $registry = NULL;
	
	private static $config = NULL;
	
	private static $log = NULL;
	
	private static $session = NULL;
	
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
		
		if (self::$session === NULL) {
			self::$session = $registry->get('session');
		}
	}
	
	public static function getDefault() {
		
		return array(
			'BG' => array(
				'locker_id'  => 20006,
				'county_id'  => 909,
				'county'     => 'София',
				'city_id'    => 113875,
				'city'       => 'София',
				'country_id' => 34,
				'country'    => 'България',
				'code'       => 'BG',
				'currency'   => 'BGN'
			),
			'RO' => array(
				'locker_id'  => 2,
				'county_id'  => 1,
				'county'     => 'Bucuresti',
				'city_id'    => 1,
				'city'       => 'Sectorul 1',
				'country_id' => 187,
				'country'    => 'Romania',
				'code'       => 'RO',
				'currency'   => 'RON'
			),
			'HU' => array(
				'locker_id'  => 10001,
				'county_id'  => 62,
				'county'     => 'Pest',
				'city_id'    => 16147,
				'city'       => 'Abony',
				'country_id' => 237,
				'country'    => 'Ungaria',
				'code'       => 'HU',
				'currency'   => 'HUF'
			)
		);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getServices() {
		
		return self::request(self::METHOD_GET, 'client/services');
	}
	
	/**
	 * @throws Exception
	 */
	public static function getPickup() {
		
		return self::request(self::METHOD_GET, 'client/pickup-points');
	}
	
	/**
	 * @throws Exception
	 */
	public static function getStatuslist() {
		
		return self::request(self::METHOD_GET, 'public/status-list');
	}
	
	/**
	 * @throws Exception
	 */
	public static function getStatusReason() {
		
		return self::request(self::METHOD_GET, 'logistic-flow/status-reason');
	}
	
	/**
	 * @throws Exception
	 */
	public static function getLockers($data) {
		
		return self::request(self::METHOD_GET, 'client/lockers', $data);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getCity($data) {
		
		return self::request(self::METHOD_GET, 'geolocation/city', $data);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getCounty($data) {
		
		return self::request(self::METHOD_GET, 'geolocation/county', $data);
	}
	
	/**
	 * @throws Exception
	 */
	public static function costShipment($data) {
		
		return self::request(self::METHOD_POST, 'awb/estimate-cost', $data);
	}
	
	/**
	 * @throws Exception
	 */
	public static function createShipment($data) {
		
		return self::request(self::METHOD_POST, 'awb', $data);
	}
	
	/**
	 * @throws Exception
	 */
	public static function getShipment($id) {
		
		return self::request(self::METHOD_GET, 'client/awb/' . $id . '/status');
	}
	
	/**
	 * @throws Exception
	 */
	public static function printShipment($id) {
		
		if (self::$config->get('shipping_tk_sameday_shipment_type')) {
			$type = self::$config->get('shipping_tk_sameday_shipment_type');
		} else {
			$type = 'A4';
		}
		//inline
		//attachment
		return self::request(self::METHOD_GET, 'awb/download/' . $id . '/' . $type . '/pdf/inline', array(), true);
	}
	
	/**
	 * @throws Exception
	 */
	public static function cancelShipment($id) {
		
		return self::request(self::METHOD_DELETE, "awb/" . $id);
	}
	
	/**
	 * @throws Exception
	 */
	public static function login($data) {
		
		if (!empty($data['shipping_tk_sameday_username']) && !empty($data['shipping_tk_sameday_password'])) {
			
			if (isset($data['shipping_tk_sameday_test']) && $data['shipping_tk_sameday_test'] == 1) {
				$url = 'https://sameday-api-bg.demo.zitec.com/api/authenticate';
			} else {
				if (!empty($data['shipping_tk_sameday_send_country']) && $data['shipping_tk_sameday_send_country'] == 'RO') {
					$url = 'https://api.sameday.ro/api/authenticate';
				} else {
					$url = 'https://api.sameday.bg/api/authenticate';
				}
			}
			
			$username = $data['shipping_tk_sameday_username'];
			$password = $data['shipping_tk_sameday_password'];
			
			$headers = array();
			$headers[] = 'X-Auth-Username: ' . $username;
			$headers[] = 'X-Auth-Password: ' . $password;
			$headers[] = 'Accept: application/json';
			$headers[] = 'Content-type: application/json';
			
			$curl = curl_init();
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			
			$response = curl_exec($curl);
			$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
			$content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
			
			$result = json_decode($response, true);
			
			if (!empty($result['token']) && !empty($result['expire_at'])) {
				self::$session->data['tk_sameday_token'] = $result['token'];
				self::$session->data['tk_sameday_expire'] = $result['expire_at'];
			} else if (!empty($result['error']['message'])) {
				$result['error'] = $result['error']['message'];
				return $result;
			} else if ($content_type == 'text/html') {
				$result['error'] = $response;
				return $result;
			}
			
			curl_close($curl);
		} else {
			$result['error'] = 'Missing credentials';
		}
		
		return $result;
	}
	
	/**
	 * @throws Exception
	 */
	private static function request($method, $endpoint, $data = array(), $pdf = false) {
		
		$now = date("Y-m-d H:m:s");
		
		if (!empty(self::$session->data['tk_sameday_token']) && !empty(self::$session->data['tk_sameday_expire']) && self::$session->data['tk_sameday_expire'] > $now) {
			$result['token'] = self::$session->data['tk_sameday_token'];
		} else {
			$result = self::token();
		}
		
		if (self::$config->get('shipping_tk_sameday_test')) {
			$url = 'https://sameday-api-bg.demo.zitec.com/api/';
		} else {
			if (self::$config->get('shipping_tk_sameday_send_country') && self::$config->get('shipping_tk_sameday_send_country') == 'RO') {
				$url = 'https://api.sameday.ro/api/';
			} else {
				$url = 'https://api.sameday.bg/api/';
			}
		}
		
		$url .= $endpoint . '?_format=json';
		
		if ($method === self::METHOD_GET && $data) {
			foreach ($data as $key => $value) {
				$url .= '&' . $key . '=' . $value;
			}
		}
		
		$url = str_replace(' ', '+', $url);
		
		if (!empty($result['token'])) {
			
			$curl = curl_init();
			
			$headers = array();
			$headers[] = 'X-AUTH-TOKEN: ' . $result['token'];
			$headers[] = 'Accept: application/json';
			if($pdf){
				$headers[] = 'Content-type: application/pdf';
			} else {
				$headers[] = 'Content-type: application/json';
			}
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 6);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			
			if ($method === self::METHOD_POST) {
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			} else if ($method === self::METHOD_DELETE) {
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
			} else {
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			}
			
			$response = curl_exec($curl);
			
			$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
			$content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
			
			if($content_type == 'application/pdf'){
				$result = $response;
			} else {
				$result = json_decode($response, true);
			}
			
			if(!empty($result['error']['code']) && $result['error']['code'] == 401){
				unset(self::$session->data['tk_sameday_token']);
				unset(self::$session->data['tk_sameday_expire']);
				
				$result = self::request($method, $endpoint, $data, $pdf);
			}
			
			if (self::$config->get('module_tk_checkout_debug')) {
				self::$log->write('Sameday:');
				self::$log->write($url);
				self::$log->write($status_code);
				self::$log->write($content_type);
				
				if($status_code != 200){
					self::$log->write($data);
					self::$log->write($result);
				}
			}
			
			curl_close($curl);
		} else if (empty($result['error'])) {
			$result['error'] = 'Missing authenticate token';
		}
		
		return $result;
	}
	
	private static function token() {

		if (self::$config->get('shipping_tk_sameday_username') && self::$config->get('shipping_tk_sameday_password')) {
			
			if (self::$config->get('shipping_tk_sameday_test')) {
				$url = 'https://sameday-api-bg.demo.zitec.com/api/authenticate';
			} else {
				if (self::$config->get('shipping_tk_sameday_send_country') && self::$config->get('shipping_tk_sameday_send_country') == 'RO') {
					$url = 'https://api.sameday.ro/api/authenticate';
				} else {
					$url = 'https://api.sameday.bg/api/authenticate';
				}
			}
			
			$username = self::$config->get('shipping_tk_sameday_username');
			$password = self::$config->get('shipping_tk_sameday_password');
			
			$headers = array();
			$headers[] = 'X-Auth-Username: ' . $username;
			$headers[] = 'X-Auth-Password: ' . $password;
			$headers[] = 'Accept: application/json';
			$headers[] = 'Content-type: application/json';
			
			$curl = curl_init();
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			
			$response = curl_exec($curl);
			$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
			$content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
			
			$result = json_decode($response, true);

			if (!empty($result['token']) && !empty($result['expire_at'])) {
				self::$session->data['tk_sameday_token'] = $result['token'];
				self::$session->data['tk_sameday_expire'] = $result['expire_at'];
			} else if (!empty($result['error']['message'])) {
				$result['error'] = $result['error']['message'];
				return $result;
			} else if ($content_type == 'text/html') {
				$result['error'] = $response;
				return $result;
			}
		
			curl_close($curl);
		} else {
			$result['error'] = 'Missing credentials';
		}
		
		return $result;
	}
}