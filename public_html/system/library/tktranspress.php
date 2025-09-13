<?php

class Tktranspress {

	const DEFAULT_COUNTRY_CODE = 'BG';

	const CURRENCY = 'BGN';

	const TRUE = 'true';

	const FALSE = 'false';

	const URL_TYPE_CALCULATE = 'https://app.transpress.bg/transpress/clients/generic/calculate.do';

	const URL_TYPE_SERVICES = 'https://app.transpress.bg/transpress/integration/suggest/service-by-endpoints.do';

	const URL_TYPE_PACKAGES = 'https://app.transpress.bg/transpress/integration/suggest/packaging.do';

	const URL_TYPE_REQUEST = 'https://app.transpress.bg/transpress/clients/generic/import.do';

	const URL_TYPE_CITY = 'https://app.transpress.bg/transpress/integration/suggest/settlement-by-country.do';

	const URL_TYPE_OFFICES = 'https://app.transpress.bg/integration/suggest/station.do';

	const URL_TYPE_PRINT = 'https://app.transpress.bg/transpress/clients/generic/print.do';

	const URL_TYPE_STATUS = 'https://app.transpress.bg/transpress/integration/tracking.do';

	const URL_TYPE_CANCEL = 'https://app.transpress.bg/transpress/clients/generic/cancel.do';

	const TYPE_CALCULATE = 'typeCalculate';

	const TYPE_REQUEST = 'typeRequest';

	const TYPE_CANCEL = 'typeCancel';

	const TYPE_SERVICES = 'typeServices';

	const TYPE_PACKAGES = 'typePackages';

	const TYPE_OFFICES = 'typeOffices';

	const TYPE_PRINT = 'typePrint';

	const TYPE_STATUS = 'typeStatus';

	const FIELD_VIEW = 'view';

	const FIELD_LOCALE = 'locale';

	const FIELD_PATTERN = 'pattern';

	const FIELD_CALCULATE = 'calculate';

	const FIELD_COUNTRY_CODE = 'countryCode';

	const FIELD_SOURCE_COUNTRY_CODE = 'sourceCountryCode';

	const FIELD_TARGET_COUNTRY_CODE = 'targetCountryCode';

	const FIELD_SOURCE_SETTLEMENT_ID = 'sourceSettlementID';

	const FIELD_TARGET_SETTLEMENT_ID = 'targetSettlementID';

	const FIELD_SOURCE_COUNTRY = 'sourceCountry';

	const FIELD_SOURCE_POST_CODE = 'sourcePostCode';

	const FIELD_SOURCE_CITY = 'sourceCity';

	const FIELD_TARGET_CITY = 'targetCity';

	const FIELD_SOURCE_STREET = 'sourceStreet';

	const FIELD_TARGET_POST_CODE = 'postCode';

	const FIELD_SHIPMENT_SERVICE_TYPE = 'shipmentServiceType';

	const FIELD_COURIER_AT_SENDER = 'sourceCourier';

	const FIELD_SENDER = 'sender';

	const FIELD_COURIER_AT_RECEIVER = 'targetCourier';

	const FIELD_OVERALL_WEIGHT = 'weight';

	const FIELD_OVERALL_VOLUME = 'volume';

	const FIELD_PACKAGING_CODE = 'packaging';

	const FIELD_HEIGHT = 'height';

	const FIELD_COD_PAYMENT_TYPE = 'codPaymentType';

	const FIELD_DECLARED_VALUE = 'declaredValue';

	const FIELD_CASH_ON_DELIVERY = 'cashOnDelivery';

	const FIELD_FRAGILE = 'insuranceFragile';

	const FIELD_PROOF_OF_DELIVERY = 'return_pod';

	const FIELD_RECEIPT_REQUIRED = 'return_doc';

	const FIELD_PACKAGE_RETURN = 'return_pkg';

	const FIELD_TARGET_STREET_NAME = 'street';

	const FIELD_TARGET_STREET_NUMBER = 'targetStreetNumber';

	const FIELD_TARGET_COMPANY_NAME = 'recipient';

	const FIELD_TARGET_CONTACT_NAME = 'person';

	const FIELD_SOURCE_CONTACT_NAME = 'sourcePerson';

	const FIELD_TARGET_CONTACT_PHONE = 'phone';

	const FIELD_SOURCE_CONTACT_PHONE = 'sourcePhone';

	const FIELD_WAREHOUSE = 'warehouse';

	const FIELD_OWN_WAREHOUSE = 'ownWarehouse';

	const FIELD_PARCELS = 'parcels';

	const FIELD_PAID_ON_DELIVERY = 'paidOnDelivery';

	const FIELD_BULSTAT = 'bulstat';

	const FIELD_REFERENCE_CODE = 'referenceCode';

	const FIELD_DESCRIPTION = 'description';

	const FIELD_INSURANCE_LIABILITY = 'insuranceLiability';

	const FIELD_TEST_ON_DELIVERY = 'testOnDelivery';

	const FIELD_REVIEW_ON_DELIVERY = 'reviewOnDelivery';

	const FIELD_SOURCE_STATION_CODE = 'sourceStation';

	const FIELD_TARGET_STATION_CODE = 'targetStation';

	const FIELD_SHIPMENT_SERVICE_DATE = 'shipmentServiceDate';

	const FIELD_PRINT_FORMAT = 'printFormat';

	const FIELD_MANIFEST_ID = 'manifestId';

	const FIELD_BARCODE = 'barcode';

	const FIELD_POSTAL_MONEY_TRANSFER = 'postal_money_transfer';

	private $type;

	private $params = array();

	private static $cache = array();

	private static $registry = NULL;

	public function __construct($registry) {

		if (self::$registry === NULL) {
			self::$registry = $registry;
		}
	}

	public function setType($type) {

		$this->type = $type;

		$this->params = array();
		$this->params[self::FIELD_PATTERN] = '?';
		$this->params[self::FIELD_VIEW] = 'xml';
	}

	public function setParam($name, $value) {

		$this->params[$name] = $value;
	}

	public function __set($name, $value) {

		if ($value === NULL || $value === '') {
			unset($this->params[$name]);
		} else {
			$this->params[$name] = $value;
		}
	}

	public function __get($name) {

		if (isset($this->params[$name])) {
			return $this->params[$name];
		}

		return NULL;
	}

	public function getCountryAndPostcodeByClass($name) {

		if (preg_match('/^\[([a-z]{2,3})\-([0-9 ]+)\]/i', $name, $match)) {
			return $match;
		}

		return false;
	}

	public function getCityByNameOrPostCode($name, $postcode, $countryCode) {

		$cityData = $this->getCityByName($name, $countryCode);
		if ($cityData === false) {
			$cityData = $this->getCityByPostCode($postcode, $countryCode);
		}

		return $cityData;
	}

	public function getCityByName($name, $countryCode) {

		if (!$name) {
			return false;
		}

		$api_url = self::URL_TYPE_CITY . '?' . http_build_query(array(
				self::FIELD_LOCALE => (self::$registry->get('language')->get('code') === 'bg') ? 'bg' : 'en',
				self::FIELD_COUNTRY_CODE => $countryCode,
				self::FIELD_PATTERN => $name
			));

		$result = simplexml_load_string($this->fileGetContents($api_url));
		if (isset($result->response->item)) {
			$items = json_decode(json_encode($result->response), true);
			if (!isset($items['item'][0]) && isset($items['item']['name'])) {
				return $items['item'];
			}
		}

		return false;
	}

	public function getCityByPostCode($postCode, $countryCode) {

		if (!preg_match('/^[0-9 ]+$/', $postCode)) {
			return false;
		}

		$api_url = self::URL_TYPE_CITY . '?' . http_build_query(array(
				self::FIELD_LOCALE => (self::$registry->get('language')->get('code') === 'bg') ? 'bg' : 'en',
				self::FIELD_COUNTRY_CODE => $countryCode,
				self::FIELD_PATTERN => $postCode
			));

		$result = simplexml_load_string($this->fileGetContents($api_url));
		if (isset($result->response->item)) {
			$items = json_decode(json_encode($result->response), true);

			if (isset($items['item'][0])) {
				$itemsFormat = $items['item'];
			} else {
				$itemsFormat = array($items['item']);
			}

			foreach ($itemsFormat as $item) {
				if (preg_match('/^\[[^\-]+\-' . $postCode . '\]/i', $item['name'])) {
					return $item;
				}
			}
		}

		return false;
	}

	public function xmlAttribute($object, $attribute) {

		if (isset($object[$attribute])) {
			return (string)$object[$attribute];
		}

		return false;
	}

	public function execute($asObject = false) {

		$url = '';

		if ($this->type === self::TYPE_CALCULATE) {
			$url = self::URL_TYPE_CALCULATE;
		} elseif ($this->type === self::TYPE_SERVICES) {
			$url = self::URL_TYPE_SERVICES;
		} elseif ($this->type === self::TYPE_PACKAGES) {
			$url = self::URL_TYPE_PACKAGES;
		} elseif ($this->type === self::TYPE_REQUEST) {
			$url = self::URL_TYPE_REQUEST;
		} elseif ($this->type === self::TYPE_CANCEL) {
			$url = self::URL_TYPE_CANCEL;
		} elseif ($this->type === self::TYPE_OFFICES) {
			$url = self::URL_TYPE_OFFICES;
		} elseif ($this->type === self::TYPE_PRINT) {
			$url = self::URL_TYPE_PRINT;
		} elseif ($this->type === self::TYPE_STATUS) {
			$url = self::URL_TYPE_STATUS;
		}

		$url .= '?' . http_build_query($this->params);
		$http_code = '';
		
		if ($this->type === self::TYPE_PRINT) {
			$result = $this->fileGetContents($url, 15, $http_code);

			if ($http_code != 200) {
				$data['error'] = $result;

				return $data;
			}

			return $result;
		}

		$result = false;
		if (isset(self::$cache[md5($url)])) {
			$result = self::$cache[md5($url)];
			if ($result !== false && is_array($result)) {
				return $result;
			}
		} else {
			$result = self::$cache[md5($url)] = $this->fileGetContents($url, 15, $http_code);

			if ($http_code != 200) {
				$data['error'] = $result;

				return $data;
			}
		}

		$result = simplexml_load_string($result);
		if ($asObject || $result === false) {
			return $result;
		}
		
		return json_decode(json_encode($result), true);
	}

	private function fileGetContents($url, $curl_timeout = 15, &$http_code = false) {

		$lang = (self::$registry->get('language')->get('code') === 'bg') ? 'bg' : 'en';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Accept-Language: ' . $lang
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_USERPWD, self::$registry->get('config')->get('shipping_tk_transpress_client') . ':' . self::$registry->get('config')->get('shipping_tk_transpress_password'));
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($curl, CURLOPT_TIMEOUT, $curl_timeout);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$content = curl_exec($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		return $content;
	}
}