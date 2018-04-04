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

abstract class AbstractPaymentOfferEntity extends AbstractPaymentOfferInfo
{

    /**
     * @var string $offerId
     */
    protected $offerId = null;

    /**
     * @var string $recipient
     */
    protected $recipient = null;

    /**
     * @var string $paymentURL
     */
    protected $paymentURL = null;

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
      parent::__construct($shopId, $ctxMode, $device, $validity, $amount, $validationMode, $currency, $locale, $sendMail);
      $this->offerId = $offerId;
    }

    /**
     * @return string
     */
    public function getOfferId()
    {
      return $this->offerId;
    }

    /**
     * @param string $offerId
     * @return \Lyranetwork\Model\AbstractPaymentOfferEntity
     */
    public function setOfferId($offerId)
    {
      $this->offerId = $offerId;
      return $this;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
      return $this->recipient;
    }

    /**
     * @param string $recipient
     * @return \Lyranetwork\Model\AbstractPaymentOfferEntity
     */
    public function setRecipient($recipient)
    {
      $this->recipient = $recipient;
      return $this;
    }

    /**
     * @return string
     */
    public function getPaymentURL()
    {
      return $this->paymentURL;
    }

    /**
     * @param string $paymentURL
     * @return \Lyranetwork\Model\AbstractPaymentOfferEntity
     */
    public function setPaymentURL($paymentURL)
    {
      $this->paymentURL = $paymentURL;
      return $this;
    }
}
