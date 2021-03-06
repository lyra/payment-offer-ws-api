<?php
/**
 * Copyright (C) 2018 Lyra Network.
 * This file is part of Lyra payment offer WS API.
 * See COPYING.md for license details.
 *
 * @author    Lyra Network <contact@lyra-network.com>
 * @copyright 2018 Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */
namespace Lyranetwork;

class PaymentOfferWS extends \SoapClient
{

	/**
	 * @param string $wsdl The wsdl file to use
	 * @param array $options A array of config values
	 */
	public function __construct($wsdl, array $options = array())
	{
		foreach (PaymentOfferWsClassLoader::getClassMap() as $key => $value) {
			if (!isset($options['classmap'][$key])) {
				$options['classmap'][$key] = $value;
			}
		}
		$options = array_merge(array ('features' => 1), $options);

		parent::__construct($wsdl, $options);
	}

	/**
	 * Check response results (expected response code).
	 *
	 * @param \Lyranetwork\Model\PaymentOfferResponse $paymentResponse
	 * @param array $expectedStatuses
	 * @throws \UnexpectedValueException
	 */
	public function checkResult(\Lyranetwork\Model\PaymentOfferResponse $paymentResponse, array $expectedStatuses = array())
	{
		if (! empty($expectedStatuses) && ! in_array($paymentResponse->getReponseCode(), $expectedStatuses)) {
			throw new \UnexpectedValueException(
					"Unexpected transaction status returned ({$paymentResponse->getResturnMessage()})."
			);
		}
	}

	/**
	 * @param  \Lyranetwork\Model\PaymentOfferInfo $info
	 * @return  \Lyranetwork\Model\PaymentOfferResponse
	 */
	public function createPaymentOffer(\Lyranetwork\Model\PaymentOfferInfo $info)
	{
		$signature = $this->generateSignature($info->getStringToSign());
		return $this->__soapCall('create', array($info, $signature));
	}

	/**
	 * @param  \Lyranetwork\Model\PaymentOfferEntity $entities
	 * @return  \Lyranetwork\Model\PaymentOfferResponse
	 */
	public function updatePaymentOffer(\Lyranetwork\Model\PaymentOfferEntity $entities)
	{
		$signature = $this->generateSignature($entities->getStringToSign());
		return $this->__soapCall('update', array($entities, $signature));
	}

	/**
	 * @param string $toSign
	 * @return string
	 */
	private function generateSignature($toSign)
	{
		return sha1($toSign);
	}
}
