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

class PaymentOfferResponse
{

    /**
     * @var AbstractPaymentOfferEntity[] $offerEntities
     */
    protected $offerEntities = null;

    /**
     * @var string $reponseCode
     */
    protected $reponseCode = null;

    /**
     * @var string $returnMessage
     */
    protected $returnMessage = null;

    /**
     * @var string $extendedCode
     */
    protected $extendedCode = null;


    public function __construct()
    {

    }

    /**
     * @return AbstractPaymentOfferEntity[]
     */
    public function getOfferEntities()
    {
      return $this->offerEntities;
    }

    /**
     * @param AbstractPaymentOfferEntity[] $offerEntities
     * @return \Lyranetwork\Model\PaymentOfferResponse
     */
    public function setOfferEntities(array $offerEntities = null)
    {
      $this->offerEntities = $offerEntities;
      return $this;
    }

    /**
     * @return string
     */
    public function getReponseCode()
    {
      return $this->reponseCode;
    }

    /**
     * @param string $reponseCode
     * @return \Lyranetwork\Model\PaymentOfferResponse
     */
    public function setReponseCode($reponseCode)
    {
      $this->reponseCode = $reponseCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getReturnMessage()
    {
      return $this->returnMessage;
    }

    /**
     * @param string $returnMessage
     * @return \Lyranetwork\Model\PaymentOfferResponse
     */
    public function setReturnMessage($returnMessage)
    {
      $this->returnMessage = $returnMessage;
      return $this;
    }

    /**
     * @return string
     */
    public function getExtendedCode()
    {
      return $this->extendedCode;
    }

    /**
     * @param string $extendedCode
     * @return \Lyranetwork\Model\PaymentOfferResponse
     */
    public function setExtendedCode($extendedCode)
    {
      $this->extendedCode = $extendedCode;
      return $this;
    }
}
