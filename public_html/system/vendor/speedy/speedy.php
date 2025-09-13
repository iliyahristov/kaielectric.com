<?php

class Speedy{
	const BULGARIA = 100;

	private $error;
	protected $ePSFacade;
	protected $resultLogin;
	protected $registry;
	public $version = '3.6.6';

	public function __construct($registry){
		$this->config = $registry->get('config');
		$this->request = $registry->get('request');
		$this->log = $registry->get('log');
		$this->registry = $registry;

		$this->initConnection();
	}

	protected function initConnection(){
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/util/Util.class.php');
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/EPSFacade.class.php');
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/soap/EPSSOAPInterfaceImpl.class.php');
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ResultSite.class.php');
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/AddrNomen.class.php');

		try{
			if(!empty($this->request->post['speedy_server_address'])){
				$server_address = $this->request->post['speedy_server_address'];
			} elseif($this->config->get('shipping_tk_speedy_server_address')){
				$server_address = $this->config->get('shipping_tk_speedy_server_address');
			} else{
				$server_address = 'https://www.speedy.bg/eps/main01.wsdl';
			}

			if(isset($this->request->post['shipping_tk_speedy_username'])){
				$username = $this->request->post['shipping_tk_speedy_username'];
			} elseif($this->config->get('shipping_tk_speedy_username')){
				$username = $this->config->get('shipping_tk_speedy_username');
			} else{
				$username = $this->config->get('shipping_tk_speedy_username');
			}
			
			if(isset($this->request->post['shipping_tk_speedy_password'])){
				$password = $this->request->post['shipping_tk_speedy_password'];
			} elseif($this->config->get('shipping_tk_speedy_password')){
				$password = $this->config->get('shipping_tk_speedy_password');
			} else{
				$password = $this->config->get('shipping_tk_speedy_password');
			}

			$ePSSOAPInterfaceImpl = new EPSSOAPInterfaceImpl($server_address);
			$this->ePSFacade = new EPSFacade($ePSSOAPInterfaceImpl, $username, $password);

			$this->resultLogin = $this->ePSFacade->getResultLogin();
		} catch(Exception $e){
			$this->error = $e->getMessage();
			$this->log->write('Speedy :: initConnection :: ' . $e->getMessage());
		}
	}

	public function getServices($lang = 'bg'){
		$this->error = '';
		$services = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listServices = $this->ePSFacade->listServices(time(), strtoupper($lang));

				if($listServices){
					foreach($listServices as $service){
						if($service->getTypeId() == 26 || $service->getTypeId() == 36){
							continue;
						}

						// Remove pallet services
						if($service->getCargoType() == 2){
							continue;
						}

						$services[$service->getTypeId()] = $service->getName();
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getServices :: ' . $e->getMessage());
			}
		}

		return $services;
	}

	public function getOffices($name = null, $city_id = null, $lang = 'bg', $country_id = self::BULGARIA){
		$this->error = '';
		$offices = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listOffices = $this->ePSFacade->listOfficesEx($name, $city_id, strtoupper($lang), $country_id);
				if($listOffices){
					foreach($listOffices as $office){
						$offices[] = array(
							'id' => $office->getId(),
							'label' => $office->getId() . ' ' . $office->getName() . ', ' . $office->getAddress()->getFullAddressString(),
							'value' => $office->getName()
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getOffices :: ' . $e->getMessage());
			}
		}

		return $offices;
	}

	public function getOfficeById($officeId, $city_id = null, $lang = 'bg'){
		$this->error = '';
		$result = '';
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listOffices = $this->ePSFacade->listOfficesEx(null, $city_id, strtoupper($lang));
				if($listOffices){
					foreach($listOffices as $office){
						if($office->getId() == $officeId){
							$result = $office;
							break;
						}
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getOfficeById :: ' . $e->getMessage());
			}
		}

		return $result;
	}

	public function getCities($name = null, $postcode = null, $country_id = null, $lang = 'bg'){
		$this->error = '';
		$cities = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ParamFilterSite.class.php');

				$paramFilterSite = new ParamFilterSite();

				if($postcode){
					$paramFilterSite->setName($name);
					$paramFilterSite->setPostCode($postcode);
				} else{
					$paramFilterSite->setSearchString($name);
				}

				if($country_id){
					$paramFilterSite->setCountryId($country_id);
				}

				$listSitesEx = $this->ePSFacade->listSitesEx($paramFilterSite, strtoupper($lang));
				$listSites = array();

				foreach($listSitesEx as $result){
					if($result->isExactMatch()){
						$listSites[] = $result->getSite();
					}
				}

				if($listSites){
					$texts['bg'] = array(
						'mun' => 'общ.',
						'area' => 'обл.',
					);
					$texts['en'] = array(
						'mun' => 'Mun.',
						'area' => 'Area',
					);

					foreach($listSites as $city){
						$label = $city->getType() . ' ' . $city->getName();
						$label .= $city->getPostCode() ? ' (' . $city->getPostCode() . ')' : '';
						$label .= ($city->getMunicipality() && $city->getMunicipality() != '-') ? ', ' . $texts[$lang]['mun'] . ' ' . $city->getMunicipality() : '';
						$label .= ($city->getRegion() && $city->getRegion() != '-') ? ', ' . $texts[$lang]['area'] . ' ' . $city->getRegion() : '';

						$cities[] = array(
							'id' => $city->getId(),
							'label' => $label,
							'value' => $label,
							'postcode' => $city->getPostCode(),
							'nomenclature' => $city->getAddrNomen()->getValue()
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getCities :: ' . $e->getMessage());
			}
		}

		return $cities;
	}

	public function getQuarters($name = null, $city_id = null, $lang = 'bg'){
		$this->error = '';
		$quarters = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listQuarters = $this->ePSFacade->listQuarters($name, $city_id, strtoupper($lang));

				if($listQuarters){
					foreach($listQuarters as $quarter){
						$quarters[] = array(
							'id' => $quarter->getId(),
							'label' => ($quarter->getType() ? $quarter->getType() . ' ' : '') . $quarter->getName(),
							'value' => ($quarter->getType() ? $quarter->getType() . ' ' : '') . $quarter->getName()
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getQuarters :: ' . $e->getMessage());
			}
		}

		return $quarters;
	}

	public function getStreets($name = null, $city_id = null, $lang = 'bg'){
		$this->error = '';
		$streets = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listStreets = $this->ePSFacade->listStreets($name, $city_id, strtoupper($lang));

				if($listStreets){
					foreach($listStreets as $street){
						$streets[] = array(
							'id' => $street->getId(),
							'label' => ($street->getType() ? $street->getType() . ' ' : '') . $street->getName(),
							'value' => ($street->getType() ? $street->getType() . ' ' : '') . $street->getName()
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getStreets :: ' . $e->getMessage());
			}
		}

		return $streets;
	}

	public function getBlocks($name = null, $city_id = null, $lang = 'bg'){
		$this->error = '';
		$blocks = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listBlocks = $this->ePSFacade->listBlocks($name, $city_id, strtoupper($lang));

				if($listBlocks){
					foreach($listBlocks as $block){
						$blocks[] = array(
							'label' => $block,
							'value' => $block
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getBlocks :: ' . $e->getMessage());
			}
		}

		return $blocks;
	}

	public function getCountries($filter = null, $lang = 'bg'){
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ParamFilterCountry.class.php');
		$this->error = '';
		$countries = array();
		$nomenclature = array(
			0 => 'NO',
			1 => 'FULL',
			2 => 'PARTIAL',
		);

		$paramFilterCountry = new ParamFilterCountry();

		if(!is_array($filter)){
			$paramFilterCountry->setName($filter);
		} else{
			if(isset($filter['country_id'])){
				$paramFilterCountry->setCountryId($filter['country_id']);
			}
			if(isset($filter['name'])){
				$paramFilterCountry->setName($filter['name']);
			}
			if(isset($filter['iso_code_2'])){
				$paramFilterCountry->setIsoAlpha2($filter['iso_code_2']);
			}
		}

		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{
				$listCountries = $this->ePSFacade->listCountriesEx($paramFilterCountry, strtoupper($lang));

				if($listCountries){
					foreach($listCountries as $country){
						$addressTypeParams = explode(';', $country->getAddressTypeParams());

						$countries[] = array(
							'id'                   => $country->getCountryId(),
							'name'                 => $country->getName(),
							'iso_code_2'           => $country->getIsoAlpha2(),
							'iso_code_3'           => $country->getIsoAlpha3(),
							'nomenclature'         => $nomenclature[$country->getSiteNomen()],
							'address_nomenclature' => ($country->getAddressTypeParams() && strtotime($addressTypeParams[0]) <= time() && $addressTypeParams[1] == 1) ? 1 : 0,
							'required_state'       => (int)$country->isRequireState(),
							'required_postcode'    => (int)$country->isRequirePostCode(),
							'active_currency_code' => $country->getActiveCurrencyCode(),
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getCountries :: ' . $e->getMessage());
			}
		}

		return $countries;
	}

	public function getStates($country_id, $name = null){
		$this->error = '';
		$states = array();

		if(isset($this->resultLogin)){
			try{
				$listStates = $this->ePSFacade->listStates($country_id, $name);

				if($listStates){
					foreach($listStates as $state){
						$states[] = array(
							'id'               => $state->getStateId(),
							'name'             => $state->getName(),
							'code'             => $state->getStateAlpha(),
							'country_id'       => $state->getCountryId(),
						);
					}
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getStates :: ' . $e->getMessage());
			}
		}

		return $states;
	}

	public function getListContractClients(){
		$return = array();

		if(isset($this->resultLogin)){
			$clients = $this->ePSFacade->listContractClients();

			foreach($clients as $client){
				$address = $client->getAddress();
				$address_string = $address->getSiteType()
				. $address->getSiteName() . ', '
				. $address->getRegionName() . ', '
				. $address->getStreetType()
				. $address->getStreetName() . ' '
				. $address->getPostCode();

				$name = array();

				if(!empty($client->getPartnerName())){
					$name[] = $client->getPartnerName();
				}

				if(!empty($client->getObjectName())){
					$name[] = $client->getObjectName();
				}

				$return[$client->getClientId()] = array(
					'clientId'   => $client->getClientId(),
					'name'       => implode(', ', $name),
					'address'    => $address_string
				);
			}
		}

		return $return;
	}

	public function getListSpecialDeliveryRequirements(){
		$return = array();

				
		if(isset($this->resultLogin)){
			$requirements = $this->ePSFacade->listSpecialDeliveryRequirements();

			foreach($requirements as $requirement){

				$return[] = array(
					'specialDeliveryId'   => $requirement->getSpecialDeliveryId(), 
					'specialDeliveryText'   => $requirement->getSpecialDeliveryText(),
					'specialDeliveryPrice'   => $requirement->getSpecialDeliveryPrice()
				);
			}
		}

		return $return;
	}
	
	public function calculate($data){
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ParamCalculation.class.php');

		$this->error = '';
		$resultCalculation = array();
		
		if($data['country_id'] != self::BULGARIA){
			$data['abroad'] = true;
		}


		if(isset($this->resultLogin)){
			try{
				
				$currency = $this->registry->get('currency');
				if($data['abroad'] && isset($data['active_currency_code']) && $currency->has($data['active_currency_code'])){
					$data['total'] = $currency->convert($data['total'], 'BGN', $data['active_currency_code']);
				}
				
				$paramCalculation = new ParamCalculation();
				$paramCalculation->setSenderId(doubleval($data['client_id']));
				$paramCalculation->setBroughtToOffice($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id'));
				$paramCalculation->setToBeCalled(!$data['abroad'] && $data['to_office'] && $data['office_id']);
				$paramCalculation->setParcelsCount($data['count']);
				$paramCalculation->setWeightDeclared($data['weight']);
				$paramCalculation->setDocuments($this->config->get('shipping_tk_speedy_documents'));
				$paramCalculation->setPalletized(false);
				$paramCalculation->setCheckTBCOfficeWorkDay(!(bool)$this->config->get('shipping_tk_speedy_check_office_work_day'));
				
				if($this->config->get('shipping_tk_speedy_special_delivery_requirement_id') && $this->config->get('shipping_tk_speedy_special_delivery_requirement_id') > 0){ 
					$paramCalculation->setSpecialDeliveryId($this->config->get('shipping_tk_speedy_special_delivery_requirement_id'));  
				} 


				if(!empty($data['parcels_size'])){
					$parcel_sizes = array();
					$parcel_weight = 0;

					foreach($data['parcels_size'] as $seqNo => $parcels_size){
						$paramParcelInfo = new ParamParcelInfo();
						$paramParcelInfo->setSeqNo($seqNo);
						$paramParcelInfo->setParcelId(-1);

						if(!empty($parcels_size['depth']) || !empty($parcels_size['height']) || !empty($parcels_size['width'])){
							$size = new Size();

							if($parcels_size['depth']){
								$size->setDepth($parcels_size['depth']);
							}

							if($parcels_size['height']){
								$size->setHeight($parcels_size['height']);
							}

							if($parcels_size['width']){
								$size->setWidth($parcels_size['width']);
							}

							$paramParcelInfo->setSize($size);
						} elseif(!empty($data['parcel_size'])){
							$paramParcelInfo->setPredefinedSize($data['parcel_size']);
						}

						if(!empty($parcels_size['weight'])){
							$paramParcelInfo->setWeight($parcels_size['weight']);

							$parcel_weight += $parcels_size['weight'];
						}

						$parcel_sizes[] = $paramParcelInfo;
					}

					if(count($parcel_sizes) == 1){
						$parcel_sizes_get = $parcel_sizes[0];
						$parcel_sizes_get = $parcel_sizes_get->getWeight();

						if(empty($parcel_sizes_get)){
							$parcel_sizes_set = $parcel_sizes[0];
							$parcel_sizes_set->setWeight($data['weight']);
							$parcel_sizes[0] = $parcel_sizes_set;
						}
					}

					if($parcel_weight){
						$paramCalculation->setWeightDeclared($parcel_weight);
					}

					$paramCalculation->setParcels($parcel_sizes);
				}

				if(!empty($data['fixed_time'])){
					$paramCalculation->setFixedTimeDelivery($data['fixed_time']);
				} else{
					$paramCalculation->setFixedTimeDelivery(null);
				}
				
				if(isset($data['payer_type']) && $data['payer_type'] == 0){
					$payerType = ParamCalculation::PAYER_TYPE_SENDER;
				} elseif(isset($data['payer_type']) && $data['payer_type'] == 1){
					$payerType = ParamCalculation::PAYER_TYPE_RECEIVER;
				} else{
					$payerType = ParamCalculation::PAYER_TYPE_SENDER;
				}

				if(isset($data['loading'])){
					if($data['insurance']){
						if($data['fragile']){
							$paramCalculation->setFragile(true);
						} else{
							$paramCalculation->setFragile(false);
						}

						$paramCalculation->setAmountInsuranceBase($data['totalNoShipping']);
						$paramCalculation->setPayerTypeInsurance($payerType);
					} else{
						$paramCalculation->setFragile(false);
					}
				} elseif($this->config->get('shipping_tk_speedy_os_enabled')){
					if($this->config->get('shipping_tk_speedy_fragile_enabled')){
						$paramCalculation->setFragile(true);
					} else{
						$paramCalculation->setFragile(false);
					}

					$paramCalculation->setAmountInsuranceBase($data['totalNoShipping']);
					$paramCalculation->setPayerTypeInsurance($payerType);
				} else{
					$paramCalculation->setFragile(false);
				}

				if(!(!$data['abroad'] && $data['to_office'] && $data['office_id'])){
					$paramCalculation->setReceiverSiteId($data['city_id']);
				}

				$paramCalculation->setPayerType($payerType);

	

				//$paramCalculation->setTakingDate($data['taking_date']);
				$paramCalculation->setAutoAdjustTakingDate(true);

				if($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')){
					$paramCalculation->setWillBringToOfficeId($this->config->get('shipping_tk_speedy_office_id'));
				}

				if(!$data['abroad'] && $data['to_office'] && $data['office_id']){
					$paramCalculation->setOfficeToBeCalledId($data['office_id']);
				} else{ 
					$paramCalculation->setOfficeToBeCalledId(null);
				}

				if(isset($data['country_id']) && $data['country_id'] != self::BULGARIA){
					$paramCalculation->setReceiverCountryId($data['country_id']);
					$paramCalculation->setReceiverPostCode($data['postcode']);
				}

				if(isset($data['cod']) && $data['cod'] && $this->config->get('shipping_tk_speedy_calculate_enabled') == 1){
					if(!$data['abroad'] && $data['to_office'] && $data['office_id']){
						if($this->config->get('shipping_tk_speedy_office_free') && $this->config->get('shipping_tk_speedy_office_free') > 0 && $data['total'] >= $this->config->get('shipping_tk_speedy_office_free')){ 
							$paramCalculation->setIncludeShippingPriceInCod(false);
						} else{
							$paramCalculation->setIncludeShippingPriceInCod(false);
						}
						
					} else{
						$paramCalculation->setIncludeShippingPriceInCod(false);
						
					}
					
				} else{
					$paramCalculation->setIncludeShippingPriceInCod(false);
				}
				
				
				if(isset($data['cod']) && $data['cod'] == 1 && ($this->config->get('shipping_tk_speedy_ppp_enabled') && !$data['abroad'])){
					$paramCalculation->setRetMoneyTransferReqAmount($data['total']);
					$paramCalculation->setAmountCodBase(null);
				} else{
					if($data['cod'] == 0){
						$paramCalculation->setAmountCodBase(null);
					} else {
						$paramCalculation->setAmountCodBase($data['total']);
					}
					
				}
			

				$obp = !empty($data['option_before_payment']) ? $data['option_before_payment'] : $this->config->get('shipping_tk_speedy_option_before_payment');
				if($data['cod'] == 0){
					$obp = 'no_option';
				}
				if($obp != 'no_option'){
					$optionBeforePayment = new ParamOptionsBeforePayment();

					if($obp == 'open'){
						$optionBeforePayment->setOpen(true);
					} elseif($obp == 'test'){
						$optionBeforePayment->setTest(true);
					}

					$optionBeforePayment->setReturnPayerType($this->config->get('shipping_tk_speedy_return_payer_type'));
					$optionBeforePayment->setReturnServiceTypeId($this->getReturnPackageServiceTypeId($paramCalculation));

					$paramCalculation->setOptionsBeforePayment($optionBeforePayment);
				}

				$resultCalculation = $this->ePSFacade->calculateMultipleServices($paramCalculation, $this->config->get('shipping_tk_speedy_allowed_methods'));

				foreach($resultCalculation as $key => $service){
					if($service->getErrorDescription()){
						//unset($resultCalculation[$key]);
					}
				}

				
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: calculate :: ' . $e->getMessage());
			}
		}

		return $resultCalculation;
	}

	public function getAllowedDaysForTaking($data){
		$this->error = '';
		$firstAvailableDate = '';

		if(isset($this->resultLogin)){
			try{
				if($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')){
					$senderSiteId = null;
					$senderOfficeId = $this->config->get('shipping_tk_speedy_office_id');
				} else{
					$resultClientData = $this->ePSFacade->getClientById($this->resultLogin->getClientId());
					$senderSiteId = $resultClientData->getAddress()->getSiteId();
					$senderOfficeId = null;
				}

				$takingTime = $this->ePSFacade->getAllowedDaysForTaking($data['shipping_method_id'], $senderSiteId, $senderOfficeId, $data['taking_date']);

				if($takingTime){
					$firstAvailableDate = $takingTime[0];
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getAllowedDaysForTaking :: ' . $e->getMessage());
			}
		}

		return $firstAvailableDate;
	}

	public function createBillOfLading($data, $order){
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ParamCalculation.class.php');

		$this->error = '';
		$bol = array();

		if(isset($this->resultLogin)){
			try{
				$sender = new ParamClientData();
				$sender->setClientId(doubleval($data['client_id']));

				if($this->config->get('shipping_tk_speedy_telephone')){
					$senderPhone = new ParamPhoneNumber();
					$senderPhone->setNumber($this->config->get('shipping_tk_speedy_telephone'));
					$sender->setPhones(array(0 => $senderPhone));
				}

				if($this->config->get('shipping_tk_speedy_name')){
					$sender->setContactName($this->config->get('shipping_tk_speedy_name'));
				}

				$receiverAddress = new ParamAddress();
				if($data['city_id']){
					$receiverAddress->setSiteId($data['city_id']);
				} else{
					$receiverAddress->setSiteName($data['city']);
				}

				if(isset($data['quarter']) && $data['quarter']){
					$receiverAddress->setQuarterName($data['quarter']);
				}

				if(isset($data['quarter_id']) && $data['quarter_id']){
					$receiverAddress->setQuarterId($data['quarter_id']);
				}

				if(isset($data['street']) && $data['street']){
					$receiverAddress->setStreetName($data['street']);
				}

				if(isset($data['street_id']) && $data['street_id']){
					$receiverAddress->setStreetId($data['street_id']);
				}

				if(isset($data['street_no']) && $data['street_no']){
					$receiverAddress->setStreetNo($data['street_no']);
				}

				if(isset($data['block_no']) && $data['block_no']){
					$receiverAddress->setBlockNo($data['block_no']);
				}

				if(isset($data['entrance_no']) && $data['entrance_no']){
					$receiverAddress->setEntranceNo($data['entrance_no']);
				}

				if(isset($data['floor_no']) && $data['floor_no']){
					$receiverAddress->setFloorNo($data['floor_no']);
				}

				if(isset($data['apartment_no']) && $data['apartment_no']){
					$receiverAddress->setApartmentNo($data['apartment_no']);
				}

				if(isset($data['note']) && $data['note']){
					$receiverAddress->setAddressNote($data['note']);
				}

				if(isset($data['state_id']) && $data['state_id']){
					$receiverAddress->setStateId($data['state_id']);
				}

				if(isset($data['country_id']) && $data['country_id']){
					$receiverAddress->setCountryId($data['country_id']);
				}

				if(isset($data['postcode']) && $data['postcode']){
					$receiverAddress->setPostCode($data['postcode']);
				}

				if(isset($data['address_1']) && $data['address_1']){
					$receiverAddress->setFrnAddressLine1($data['address_1']);
				}

				if(isset($data['address_2']) && $data['address_2']){
					$receiverAddress->setFrnAddressLine2($data['address_2']);
				}

				if(isset($data['state_id']) && $data['state_id']){
					$receiverAddress->setStateId($data['state_id']);
				}

				$receiver = new ParamClientData();
				$receiverPhone = new ParamPhoneNumber();
				$receiverPhone->setNumber($data['custmer_telephone']);
				//$receiverPhone->setNumber($order['telephone']);
				$receiver->setPhones(array(0 => $receiverPhone));
				
				/*
				if(!empty($order['payment_company'])){
				$receiver->setContactName($order['shipping_firstname'] . ' ' . $order['shipping_lastname']);
				$receiver->setPartnerName($order['payment_company']);
				} else{
				$receiver->setPartnerName($order['shipping_firstname'] . ' ' . $order['shipping_lastname']);
				}
				*/
				$receiver->setPartnerName($data['custmer_name']);
				$receiver->setEmail($data['custmer_email']);

				//$receiver->setEmail($order['email']);

				$picking = new ParamPicking();
				$picking->setClientSystemId(1310221366); //OpenCart
				$picking->setRef1($order['order_id']);
				$picking->setParcelsCount($data['count']);
				$picking->setWeightDeclared($data['weight']);
				
				if($this->config->get('shipping_tk_speedy_special_delivery_requirement_id') && $this->config->get('shipping_tk_speedy_special_delivery_requirement_id') > 0){ 
					$picking->setSpecialDeliveryId($this->config->get('shipping_tk_speedy_special_delivery_requirement_id'));  
				} 

				if(!empty($data['convertion_to_win1251'])){
					$picking->setAutomaticConvertionToWin1251(true);
				}

				if(!empty($data['parcels_size'])){
					$parcel_sizes = array();
					$parcel_weight = 0;

					foreach($data['parcels_size'] as $seqNo => $parcels_size){
						$paramParcelInfo = new ParamParcelInfo();
						$paramParcelInfo->setSeqNo($seqNo);
						$paramParcelInfo->setParcelId(-1);

						if(!empty($parcels_size['depth']) || !empty($parcels_size['height']) || !empty($parcels_size['width'])){
							$size = new Size();

							if($parcels_size['depth']){
								$size->setDepth($parcels_size['depth']);
							}

							if($parcels_size['height']){
								$size->setHeight($parcels_size['height']);
							}

							if($parcels_size['width']){
								$size->setWidth($parcels_size['width']);
							}

							$paramParcelInfo->setSize($size);
						} elseif(!empty($data['parcel_size'])){
							$paramParcelInfo->setPredefinedSize($data['parcel_size']);
						}

						if(!empty($parcels_size['weight'])){
							$paramParcelInfo->setWeight($parcels_size['weight']);

							$parcel_weight += $parcels_size['weight'];
						}

						$parcel_sizes[] = $paramParcelInfo;
					}

					if(count($parcel_sizes) == 1){
						$parcel_sizes_get = $parcel_sizes[0];
						$parcel_sizes_get = $parcel_sizes_get->getWeight();

						if(empty($parcel_sizes_get)){
							$parcel_sizes_set = $parcel_sizes[0];
							$parcel_sizes_set->setWeight($data['weight']);
							$parcel_sizes[0] = $parcel_sizes_set;
						}
					}

					if($parcel_weight){
						$picking->setWeightDeclared($parcel_weight);
					}

					$picking->setParcels($parcel_sizes);
				}

				if(!empty($data['fixed_time'])){
					$picking->setFixedTimeDelivery($data['fixed_time']);
				}

				$picking->setServiceTypeId($data['shipping_method_id']);

				if($data['to_office'] && $data['office_id']){
					$picking->setOfficeToBeCalledId($data['office_id']);

					$office = $this->getOfficeById($data['office_id']);
				} else{
					$receiver->setAddress($receiverAddress);
					$picking->setOfficeToBeCalledId(null);
					$office = array();
				}

				$service = $this->getServiceById($data['shipping_method_id']);

				if((empty($office) || $office->getOfficeType() != 3) && !empty($service)){
					if($service->getAllowanceBackDocumentsRequest()->getValue() == 'ALLOWED'){
						$picking->setBackDocumentsRequest($this->config->get('shipping_tk_speedy_back_documents'));
					}

					if($service->getAllowanceBackReceiptRequest()->getValue() == 'ALLOWED'){
						$picking->setBackReceiptRequest($this->config->get('shipping_tk_speedy_back_receipt'));
					}
				}

				$tk_speedy_offices_id = $this->config->get('shipping_tk_speedy_offices_id');
				$tk_speedy_from_offices = $this->config->get('shipping_tk_speedy_from_offices');
				
				if(isset($tk_speedy_offices_id[$data['client_id']]) && isset($tk_speedy_from_offices[$data['client_id']]) && $tk_speedy_offices_id[$data['client_id']] && $tk_speedy_from_offices[$data['client_id']]){
					$picking->setWillBringToOffice(true);
					$picking->setWillBringToOfficeId($tk_speedy_offices_id[$data['client_id']]);
				} else if($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')){
					$picking->setWillBringToOffice(true);
					$picking->setWillBringToOfficeId($this->config->get('shipping_tk_speedy_office_id'));
				} else{
					$picking->setWillBringToOffice(false);
				}

				$picking->setContents($data['contents']);
				$picking->setPacking($data['packing']);
				$picking->setPackId(null);
				$picking->setDocuments($this->config->get('shipping_tk_speedy_documents'));
				$picking->setPalletized(false);

				$payerType = $data['payer_type'];

				if($data['insurance']){
					if($data['fragile']){
						$picking->setFragile(true);
					} else{
						$picking->setFragile(false);
					}

					$picking->setAmountInsuranceBase($data['totalNoShipping']);

					$picking->setPayerTypeInsurance($payerType);
				} else{
					$picking->setFragile(false);
				}

				$picking->setSender($sender);
				$picking->setReceiver($receiver);

				$picking->setPayerType($payerType);

				$picking->setTakingDate($data['taking_date']);

				if(isset($data['deffered_days'])){
					$picking->setDeferredDeliveryWorkDays($data['deffered_days']);
				}

				if(isset($data['client_note'])){
					$picking->setNoteClient($data['client_note']);
				}

				if($this->config->get('shipping_tk_speedy_pricing') == 'table_rate'){
					$data['total'] += $data['shipping_method_cost'];
				}

				$currency = $this->registry->get('currency');
				if($data['abroad'] && isset($data['active_currency_code']) && $currency->has($data['active_currency_code'])){
					$data['total'] = $currency->convert($data['total'], 'BGN', $data['active_currency_code']);
				}

				if(isset($data['cod']) && $data['cod'] == 1 && ($this->config->get('shipping_tk_speedy_ppp_enabled') && !$data['abroad'])){
					$picking->setRetMoneyTransferReqAmount($data['total']);
					$picking->setAmountCodBase(null);
				} else{
					if($data['cod'] == 0){
						$picking->setAmountCodBase(null);
					} else {
						$picking->setAmountCodBase($data['total']);
					}
				}
			
				$optionBeforePayment = new ParamOptionsBeforePayment();
				if($data['cod'] && isset($data['option_before_payment']) && $data['option_before_payment'] != 'no_option' && (empty($office) || $office->getOfficeType() != 3)){
					if($data['option_before_payment'] == 'open'){
						$optionBeforePayment->setOpen(true);
					} elseif($data['option_before_payment'] == 'test'){
						$optionBeforePayment->setTest(true);
					}

					$optionBeforePayment->setReturnPayerType($this->config->get('shipping_tk_speedy_return_payer_type'));
					$optionBeforePayment->setReturnServiceTypeId($this->getReturnPackageServiceTypeId($picking));
				}
				$picking->setOptionsBeforePayment($optionBeforePayment);

				if(isset($data['cod']) && $data['cod'] && $this->config->get('shipping_tk_speedy_calculate_enabled') == 1){
					if(!$data['abroad'] && $data['to_office'] && $data['office_id']){
						if($this->config->get('shipping_tk_speedy_office_free') && $this->config->get('shipping_tk_speedy_office_free') > 0 && $data['total'] >= $this->config->get('shipping_tk_speedy_office_free')){ 
							$picking->setIncludeShippingPriceInCod(false);
						} else{
							$picking->setIncludeShippingPriceInCod(false);
						}
						
					} else{
						if($this->config->get('shipping_tk_speedy_door_free') && $this->config->get('shipping_tk_speedy_door_free') > 0 && $data['total'] >= $this->config->get('shipping_tk_speedy_door_free')){ 
							$picking->setIncludeShippingPriceInCod(false);
						} else{
							$picking->setIncludeShippingPriceInCod(false);
						}
						
					}
					
				} else{
					$picking->setIncludeShippingPriceInCod(false);
				}

				if($this->config->get('shipping_tk_speedy_return_voucher') && (!isset($data['abroad']) || !$data['abroad'])){
					$returnVoucher = new ParamReturnVoucher();
					$returnVoucher->setServiceTypeId($this->getReturnVoucherServiceTypeId($picking));
					$returnVoucher->setPayerType($this->config->get('shipping_tk_speedy_return_voucher_payer_type'));

					$picking->setReturnVoucher($returnVoucher);
				}

				$result = $this->ePSFacade->createBillOfLading($picking);
				$parcels = $result->getGeneratedParcels();

				$parcels = $parcels[0];
				
				
				//print_r($result);
				$bol['bol_id'] = $parcels->getParcelId();
				$bol['total'] = $result->getAmounts()->getTotal();
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: createBillOfLading :: ' . $e->getMessage());
			}
		}

		return $bol;
	}

	public function createPDF($bol_id){
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ParamPDF.class.php');

		$this->error = '';
		$pdf = '';

		if(isset($this->resultLogin)){
			try{
				$paramPDF = new ParamPDF();

				if($this->config->get('shipping_tk_speedy_label_printer')){
					$pickingParcels = $this->ePSFacade->getPickingParcels((float)$bol_id);

					$ids = array();

					foreach($pickingParcels as $parcel){
						$ids[] = $parcel->getParcelId();
					}

					$paramPDF->setIds($ids);
					$paramPDF->setType(ParamPDF::PARAM_PDF_TYPE_LBL);
				} else{
					$paramPDF->setIds((float)$bol_id);
					$paramPDF->setType(ParamPDF::PARAM_PDF_TYPE_BOL);
				}

				$paramPDF->setIncludeAutoPrintJS(true);

				$pdf = $this->ePSFacade->createPDF($paramPDF);
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: createPDF :: ' . $e->getMessage());
			}
		}

		return $pdf;
	}

	public function createReturnVoucher($bol_id){
		require_once(DIR_SYSTEM . 'vendor/speedy/speedy-eps-lib/ver01/ParamPDF.class.php');

		$this->error = '';
		$pdf = '';

		if(isset($this->resultLogin)){
			try{
				$paramPDF = new ParamPDF();

				if($this->config->get('shipping_tk_speedy_label_printer')){
					$pickingParcels = $this->ePSFacade->getPickingParcels((float)$bol_id);

					$ids = array();

					foreach($pickingParcels as $parcel){
						$ids[] = $parcel->getParcelId();
					}

					$paramPDF->setIds($ids);
				} else{
					$paramPDF->setIds((float)$bol_id);
				}

				$paramPDF->setType(30); // ParamPDF::PARAM_PDF_TYPE_VOUCHER

				$paramPDF->setIncludeAutoPrintJS(true);

				$pdf = $this->ePSFacade->createPDF($paramPDF);
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: createReturnVoucher :: ' . $e->getMessage());
			}
		}

		return $pdf;
	}

	public function requestCourier($bol_ids){
		$this->error = '';
		$result = array();

		if(isset($this->resultLogin)){
			try{
				$paramOrder = new ParamOrder();
				$paramOrder->setBillOfLadingsList(array_map('floatval', $bol_ids));
				$paramOrder->setBillOfLadingsToIncludeType(ParamOrder::ORDER_BOL_INCLUDE_TYPE_EXPLICIT);

				if($this->config->get('shipping_tk_speedy_telephone')){
					$paramPhoneNumber = new ParamPhoneNumber();
					$paramPhoneNumber->setNumber($this->config->get('shipping_tk_speedy_telephone'));
					$paramOrder->setPhoneNumber($paramPhoneNumber);
				}

				$paramOrder->setWorkingEndTime($this->config->get('shipping_tk_speedy_workingtime_end_hour') . $this->config->get('shipping_tk_speedy_workingtime_end_min'));
				$paramOrder->setContactName($this->config->get('shipping_tk_speedy_name'));

				$result = $this->ePSFacade->createOrder($paramOrder);
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: requestCourier :: ' . $e->getMessage());
			}
		}

		return $result;
	}

	public function cancelBol($bol_id){
		$this->error = '';
		$cancelled = false;

		if(isset($this->resultLogin)){
			try{
				$this->ePSFacade->invalidatePicking((float)$bol_id);
				$cancelled = true;
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: cancelBol :: ' . $e->getMessage());
			}
		}

		return $cancelled;
	}

	public function getError($type = null){
		if($type){
			if(isset($this->error[$type])){
				return $this->error[$type];
			} else{
				return false;
			}
		} else{
			return $this->error;
		}
	}
	
	public function setError($error, $type = null){
		if($type){
			$this->error[$type] = $error;
		}else{
			$this->error = $error;
		}
	}

	public function checkCredentials($username, $password){
		$this->ePSFacade->setUsername($username);
		$this->ePSFacade->setPassword($password);

		try{

			return $this->ePSFacade->login();
		} catch(ClientException $ce){
			return FALSE;
		} catch(ServerException $se){
			return FALSE;
		}
	}

	public function isAvailableMoneyTransfer(){
		if(isset($this->resultLogin)){
			try{
				return in_array('101', $this->ePSFacade->getAdditionalUserParams(time()));
			} catch(ClientException $ce){
				return FALSE;
			} catch(ServerException $se){
				return FALSE;
			}
		} else{
			return FALSE;
		}
	}

	public function checkReturnVoucherRequested($bol_id){
		$this->error = '';
		$voucherRequested = false;

		if(isset($this->resultLogin)){
			try{
				$pickingExtendedInfo = $this->ePSFacade->getPickingExtendedInfo((float)$bol_id);

				if(!is_null($pickingExtendedInfo->getReturnVoucher()) && ($pickingExtendedInfo->getReturnVoucher() instanceof ResultReturnVoucher)){
					$voucherRequested = true;
				}
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: checkReturnVoucherRequested :: ' . $e->getMessage());
			}
		}

		return $voucherRequested;
	}

	public function getServiceById($service_id, $lang = 'bg'){
		$services = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		try{
			$servises = $this->ePSFacade->listServices(time(), strtoupper($lang));

			foreach($servises as $servise){
				if($servise->getTypeId() == $service_id){
					return $servise;
				}
			}
		} catch(Exception $e){
			$this->error = $e->getMessage();
			$this->log->write('Speedy :: getServiceById :: ' . $e->getMessage());
		}
	}

	public function getReturnPackageServiceTypeId($picking){
		$this->error = '';
		$services = array();
		$returnVoucherServiceTypeId = null;

		try{
			if($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')){
				$senderOfficeId = $this->config->get('shipping_tk_speedy_office_id');
				$senderSiteId = null;
			} else{
				
				if(method_exists($picking, 'getSenderId')){
					$senderData = $this->ePSFacade->getClientById($picking->getSenderId());
					$senderSiteId = $senderData->getAddress()->getSiteId();
				} elseif(method_exists($picking, 'getSender')){
					$senderData = $this->ePSFacade->getClientById($picking->getSender()->getClientId());
					$senderSiteId = $senderData->getAddress()->getSiteId();
				}
				
				$senderOfficeId = null;
			}

			if($picking->getOfficeToBeCalledId()){
				$receiverOfficeId = $picking->getOfficeToBeCalledId();
				$receiverSiteId = null;
			} else{
				$receiverOfficeId = null;

				if(method_exists($picking, 'getReceiver')){
					$receiverSiteId = $picking->getReceiver()->getAddress()->getSiteId();
				} elseif(method_exists($picking, 'getReceiverSiteId')){
					$receiverSiteId = $picking->getReceiverSiteId();
				} else{
					$receiverSiteId = null;
				}
			}

			// Reverse sender and receiver data
			$listServices = $this->ePSFacade->listServicesForSites(time(), $receiverSiteId, $senderSiteId, null, null, null, null, null, null, null, $receiverOfficeId, $senderOfficeId);

			foreach($listServices as $listService){
				$services[] = $listService->getTypeId();
			}

			if(in_array($this->config->get('shipping_tk_speedy_return_package_city_service_id'), $services)){
				$returnVoucherServiceTypeId = $this->config->get('shipping_tk_speedy_return_package_city_service_id');
			} elseif(in_array($this->config->get('shipping_tk_speedy_return_package_intercity_service_id'), $services)){
				$returnVoucherServiceTypeId = $this->config->get('shipping_tk_speedy_return_package_intercity_service_id');
			}

		} catch(Exception $e){
			$this->error = $e->getMessage();
			$this->log->write('Speedy :: getReturnPackageServiceTypeId :: ' . $e->getMessage());
		}

		return $returnVoucherServiceTypeId;
	}

	public function getReturnVoucherServiceTypeId($picking){
		$this->error = '';
		$services = array();
		$returnVoucherServiceTypeId = null;

		$sender = $picking->getSender();
		$receiver = $picking->getReceiver();

		try{
			if($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')){
				$senderSiteId = null;
				$senderOfficeId = $this->config->get('shipping_tk_speedy_office_id');
			} else{
			
				$senderData = $this->ePSFacade->getClientById($picking->getSender()->getClientId());
				$senderSiteId = $senderData->getSiteId();
				
				$senderOfficeId = null;
			}

			if($receiver->getAddress()){
				$receiverSiteId = $receiver->getAddress()->getSiteId();
				$receiverOfficeId = null;
			} else{
				$receiverSiteId = null;
				$receiverOfficeId = $picking->getOfficeToBeCalledId();
			}

			// Reverse sender and receiver data
			$listServices = $this->ePSFacade->listServicesForSites(time(), $receiverSiteId, $senderSiteId, null, null, null, null, null, null, null, $receiverOfficeId, $senderOfficeId);

			foreach($listServices as $listService){
				$services[] = $listService->getTypeId();
			}

			if(in_array($this->config->get('shipping_tk_speedy_return_voucher_city_service_id'), $services)){
				$returnVoucherServiceTypeId = $this->config->get('shipping_tk_speedy_return_voucher_city_service_id');
			} elseif(in_array($this->config->get('shipping_tk_speedy_return_voucher_intercity_service_id'), $services)){
				$returnVoucherServiceTypeId = $this->config->get('shipping_tk_speedy_return_voucher_intercity_service_id');
			}

		} catch(Exception $e){
			$this->error = $e->getMessage();
			$this->log->write('Speedy :: getReturnVoucherServiceTypeId :: ' . $e->getMessage());
		}

		return $returnVoucherServiceTypeId;
	}

	public function getPayerType($order_id, $shippingCost){
		$payerType = null;

		$db = $this->registry->get('db');
		$session = $this->registry->get('session');
		$query = $db->query("SELECT data FROM " . DB_PREFIX . "tk_speedy_order WHERE order_id = '" . (int) $order_id . "'");

		$data = unserialize($query->row['data']);

		if($data['price_gen_method'] && !$session->data['is_speedy_bol_recalculated']){
			if($data['price_gen_method'] == 'fixed' || $data['price_gen_method'] == 'free'){
				if($data['price_gen_method'] == 'free'){
					$delta = 0.0001;

					if(abs($data['shipping_method_cost'] - 0.0000) < $delta){
						$payerType = ParamCalculation::PAYER_TYPE_SENDER;
					} else{
						$payerType = ParamCalculation::PAYER_TYPE_RECEIVER;
					}
				} else{
					$payerType = ParamCalculation::PAYER_TYPE_SENDER;
				}
			} else{
				$payerType = ParamCalculation::PAYER_TYPE_RECEIVER;
			}
		} elseif($data['price_gen_method'] && $session->data['is_speedy_bol_recalculated']){
			if($this->config->get('shipping_tk_speedy_pricing') == 'free' || $this->config->get('shipping_tk_speedy_pricing') == 'fixed' || $this->config->get('shipping_tk_speedy_pricing') == 'table_rate'){
				if($this->config->get('shipping_tk_speedy_pricing') == 'free'){
					$delta = 0.0001;

					if(($shippingCost - 0.0000) < $delta){
						$payerType = ParamCalculation::PAYER_TYPE_SENDER;
					} else{
						$payerType = ParamCalculation::PAYER_TYPE_RECEIVER;
					}
				}else{
					$payerType = ParamCalculation::PAYER_TYPE_SENDER;
				}
			}else{
				$payerType = ParamCalculation::PAYER_TYPE_RECEIVER;
			}
		} elseif(!$data['price_gen_method']){
			if($this->config->get('shipping_tk_speedy_pricing') == 'free' || $this->config->get('shipping_tk_speedy_pricing') == 'fixed' || $this->config->get('shipping_tk_speedy_pricing') == 'table_rate'){
				$payerType = ParamCalculation::PAYER_TYPE_SENDER;
			} else{
				$payerType = ParamCalculation::PAYER_TYPE_RECEIVER;
			}
		}

		$allowed_pricings = array(
			'calculator',
			'free',
			'calculator_fixed'
		);
		if($this->config->get('shipping_tk_speedy_invoice_courier_sevice_as_text') && 
			in_array($this->config->get('shipping_tk_speedy_pricing'), $allowed_pricings) &&
			(isset($data['cod']) && !$data['cod'])
		){
			$payerType = ParamCalculation::PAYER_TYPE_SENDER;
		}

		// International Shipping
		if(isset($data['abroad']) && $data['abroad']){
			$payerType = ParamCalculation::PAYER_TYPE_SENDER;
		}

		return $payerType;
	}

	public function validateAddress($address){
		$paramAddress = new ParamAddress();

		$paramAddress->setSiteId(trim($address['city_id']));
		if(!isset($address['city_id']) || !$address['city_id']){
			$paramAddress->setSiteName(trim($address['city']));
		}
		$paramAddress->setPostCode(trim($address['postcode']));
		$paramAddress->setCountryId(trim($address['country_id']));
		if(isset($address['state_id'])){
			$paramAddress->setStateId(trim($address['state_id']));
		}
		if(!empty($address['quarter'])){
			$paramAddress->setQuarterName(trim($address['quarter']));
		}

		if(!empty($address['quarter_id'])){
			$paramAddress->setQuarterId(trim($address['quarter_id']));
		}

		if(!empty($address['street'])){
			$paramAddress->setStreetName(trim($address['street']));
		}

		if(!empty($address['street_id'])){
			$paramAddress->setStreetId(trim($address['street_id']));
		}

		if(!empty($address['street_no'])){
			$paramAddress->setStreetNo(trim($address['street_no']));
		}

		if(!empty($address['block_no'])){
			$paramAddress->setBlockNo(trim($address['block_no']));
		}

		if(!empty($address['entrance_no'])){
			$paramAddress->setEntranceNo(trim($address['entrance_no']));
		}

		if(!empty($address['floor_no'])){
			$paramAddress->setFloorNo(trim($address['floor_no']));
		}

		if(!empty($address['apartment_no'])){
			$paramAddress->setApartmentNo(trim($address['apartment_no']));
		}

		if(!empty($address['note'])){
			$paramAddress->setAddressNote(trim($address['note']));
		}

		if(!empty($address['address_1'])){
			$paramAddress->setFrnAddressLine1(trim($address['address_1']));
		} elseif(!empty($address['note'])){
			$paramAddress->setFrnAddressLine1(trim($address['note']));
		}

		if(!empty($address['address_2'])){
			$paramAddress->setFrnAddressLine2(trim($address['address_2']));
		}

		try{
			$valid = $this->ePSFacade->validateAddress($paramAddress, 0);
		} catch(Exception $e){
			$valid = $e->getMessage();
		}

		return $valid;
	}

	public function trackParcel($order_id, $lang = 'bg'){
		$this->error = '';
		$parcels = array();
		if(strtolower($lang) != 'bg'){
			$lang = 'en';
		}

		if(isset($this->resultLogin)){
			try{

				//returnOnlyLastOperation true

				$dataParcel = $this->ePSFacade->trackParcel($order_id, strtoupper($lang), true);

				if($dataParcel){
					foreach($dataParcel as $parcel){
						$parcels['code'] = $parcel->getOperationCode();
						$parcels['description'] = $parcel->getOperationDescription();
					}
				}
				
			} catch(Exception $e){
				$this->error = $e->getMessage();
				$this->log->write('Speedy :: getServices :: ' . $e->getMessage());
			}
		}

		return $parcels;
	}
}
?>