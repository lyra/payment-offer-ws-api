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

Abstract class BasePaymentOfferInfo extends AbstractPaymentOfferInfo
{

    /**
     * @var string[] $recipients
     */
    protected $recipients = null;

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
     * @param string[] $recipients
     */
    public function __construct($shopId, $ctxMode, $device, \DateTime $validity, $amount, $validationMode, $currency, $locale, $sendMail, array $recipients)
    {
      parent::__construct($shopId, $ctxMode, $device, $validity, $amount, $validationMode, $currency, $locale, $sendMail);
      $this->recipients = $recipients;
    }

    /**
     * @return string[]
     */
    public function getRecipients()
    {
      return $this->recipients;
    }

    /**
     * @param string[] $recipients
     * @return \Lyranetwork\Model\BasePaymentOfferInfo
     */
    public function setRecipients(array $recipients)
    {
      $this->recipients = $recipients;
      return $this;
    }
}
