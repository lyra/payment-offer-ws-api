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