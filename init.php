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

require_once(dirname(__FILE__) . '/lib/Lyranetwork/PaymentOfferWsClassLoader.php');
\Lyranetwork\PaymentOfferWsClassLoader::register(true);

require_once(dirname(__FILE__) . '/lib/Lyranetwork/PaymentOfferWS.php');