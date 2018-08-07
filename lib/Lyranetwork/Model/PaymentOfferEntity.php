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
namespace Lyranetwork\Model;

class PaymentOfferEntity extends AbstractPaymentOfferEntity
{

	/**
	 * @var string $expandedData
	 */
	private $certificate = null;

	/**
	 * @var string $expandedData
	 */
	protected $expandedData = null;


	/**
	 * @param string $keyTest
	 * @param string $keyProd
	 * @return \Lyranetwork\Model\PaymentOfferInfo
	 */
	public function setCertificate($keyTest, $keyProd)
	{
		$this->certificate = ($this->getCtxMode() === 'PRODUCTION') ? $keyProd : $keyTest;
		return $this;
	}
	/**
	 * @return string
	 */
	public function getExpandedData()
	{
		return $this->expandedData;
	}

	/**
	 * @param string $expandedData
	 * @return \Lyranetwork\Model\PaymentOfferEntity
	 */
	public function setExpandedData($expandedData)
	{
		$this->expandedData = $expandedData;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getStringToSign() {
		$validity = $this->getValidity()->format('Ymd');
		$sendMail = $this->getSendMail() ? '1' : '0';

		$toSign = $this->getShopId(). '+' .$this->getOfferId(). '+' .$this->getReference(). '+' .$this->getCtxMode(). '+' .$this->getAmount(). '+' . $this->getCurrency(). '+' .$this->getLocale().
		'+' .$this->getMessage(). '+' .$this->getRecipient(). '+' .$this->getSubject(). '+' .$this->getValidationMode(). '+' .$validity. '+' .$sendMail. '+' .$this->getExpandedData().
		'+' .$this->certificate;

		return $toSign;
	}
}