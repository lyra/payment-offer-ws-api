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

abstract class AbstractPaymentOfferInfo
{

    /**
     * @var string $shopId
     */
    protected $shopId = null;

    /**
     * @var string $ctxMode
     */
    protected $ctxMode = null;

    /**
     * @var string $reference
     */
    protected $reference = null;

    /**
     * @var string $template
     */
    protected $template = null;

    /**
     * @var string $subject
     */
    protected $subject = null;

    /**
     * @var string $message
     */
    protected $message = null;

    /**
     * @var string $device
     */
    protected $device = null;

    /**
     * @var \DateTime $validity
     */
    protected $validity = null;

    /**
     * @var int $amount
     */
    protected $amount = null;

    /**
     * @var int $validationMode
     */
    protected $validationMode = null;

    /**
     * @var int $currency
     */
    protected $currency = null;

    /**
     * @var string $locale
     */
    protected $locale = null;

    /**
     * @var boolean $sendMail
     */
    protected $sendMail = null;

    /**
     * @return string
     */
    public function getShopId()
    {
      return $this->shopId;
    }

    /**
     * @param string $shopId
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setShopId($shopId)
    {
      $this->shopId = $shopId;
      return $this;
    }

    /**
     * @return string
     */
    public function getCtxMode()
    {
      return $this->ctxMode;
    }

    /**
     * @param string $ctxMode
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setCtxMode($ctxMode)
    {
      $this->ctxMode = $ctxMode;
      return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
      return $this->reference;
    }

    /**
     * @param string $reference
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setReference($reference)
    {
      $this->reference = $reference;
      return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
      return $this->template;
    }

    /**
     * @param string $template
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setTemplate($template)
    {
      $this->template = $template;
      return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
      return $this->subject;
    }

    /**
     * @param string $subject
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setSubject($subject)
    {
      $this->subject = $subject;
      return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->message;
    }

    /**
     * @param string $message
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setMessage($message)
    {
      $this->message = $message;
      return $this;
    }

    /**
     * @return string
     */
    public function getDevice()
    {
      return $this->device;
    }

    /**
     * @param string $device
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setDevice($device)
    {
      $this->device = $device;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getValidity()
    {
      if ($this->validity == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->validity);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $validity
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setValidity(\DateTime $validity)
    {
      $this->validity = $validity->format(\DateTime::ATOM);
      return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
      return $this->amount;
    }

    /**
     * @param int $amount
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setAmount($amount)
    {
      $this->amount = $amount;
      return $this;
    }

    /**
     * @return int
     */
    public function getValidationMode()
    {
      return $this->validationMode;
    }

    /**
     * @param int $validationMode
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setValidationMode($validationMode)
    {
      $this->validationMode = $validationMode;
      return $this;
    }

    /**
     * @return int
     */
    public function getCurrency()
    {
      return $this->currency;
    }

    /**
     * @param int $currency
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setCurrency($currency)
    {
      $this->currency = $currency;
      return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
      return $this->locale;
    }

    /**
     * @param string $locale
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setLocale($locale)
    {
      $this->locale = $locale;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSendMail()
    {
      return $this->sendMail;
    }

    /**
     * @param boolean $sendMail
     * @return \Lyranetwork\Model\AbstractPaymentOfferInfo
     */
    public function setSendMail($sendMail)
    {
      $this->sendMail = $sendMail;
      return $this;
    }
}
