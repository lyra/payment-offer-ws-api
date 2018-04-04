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

use DateInterval;

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
     * @param string $shopId
     * @param string $ctxMode
     * @param string $device
     * @param \DateTime $validity
     * @param int $amount
     * @param int $validationMode
     * @param int $currency
     * @param string $locale
     * @param boolean $sendMail
     * @param string $offerId
     */
    public function __construct($shopId, $ctxMode, $device, \DateTime $validity, $amount, $validationMode, $currency, $locale, $sendMail, $offerId)
    {
      parent::__construct($shopId, $ctxMode, $device, $validity, $amount, $validationMode, $currency, $locale, $sendMail, $offerId);
    }

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
     * @param string $key
     * @return string
     */
    public function sign() {
        $validity = $this->getValidity()->sub(new DateInterval('P1D'));
        $validitySign = $validity->format('Ymd');
        $sendMail = ($this->getSendMail() === 'true') ? 1 : 0;

        $toSign = $this->getShopId(). '+' .$this->getOfferId(). '+' .$this->getReference(). '+' .$this->getCtxMode(). '+' .$this->getAmount(). '+' . $this->getCurrency(). '+' .$this->getLocale().
                   '+' .$this->getMessage(). '+' .$this->getRecipient(). '+' .$this->getSubject(). '+' .$this->getValidationMode(). '+' .$validitySign. '+' .$sendMail .'+' .$this->getExpandedData().
                   '+' .$this->certificate;

        $signature = sha1($toSign);
        return $signature;
    }
}
