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
    public function __construct(array $options = array(), $wsdl = null)
    {
        foreach (PaymentOfferWsClassLoader::getClassMap() as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        $options = array_merge(array ('features' => 1), $options);

        if (!$wsdl) {
            $wsdl = 'https://secure.payzen.eu/vads-ws/paymentoffer-v2?wsdl';
        }

        parent::__construct($wsdl, $options);
    }

    /**
     * @param  \Lyranetwork\Model\PaymentOfferInfo $info
     * @return  \Lyranetwork\Model\PaymentOfferResponse
     */
    public function create(\Lyranetwork\Model\PaymentOfferInfo $info)
    {
    	return $this->__soapCall('create', array($info, $info->sign()));
    }

    /**
     * @param  \Lyranetwork\Model\PaymentOfferEntity $entities
     * @return  \Lyranetwork\Model\PaymentOfferResponse
     */
    public function update(\Lyranetwork\Model\PaymentOfferEntity $entities)
    {
    	return $this->__soapCall('update', array($entities, $entities->sign()));
    }
}
