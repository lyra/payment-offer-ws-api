<?php
/**
 * Copyright (C) 2017-2018 Lyra Network.
 * This file is part of Lyra payment WS API.
 * See COPYING.md for license details.
 *
 * @author Lyra Network <contact@lyra-network.com>
 * @copyright 2017-2018 Lyra Network
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */
namespace Lyranetwork\Model;

class PaymentOfferWSTest extends \PHPUnit\Framework\TestCase
{

    private static $paymentOfferApi;

    private static $apiUrl;
    private static $shopId;
    private static $ctxMode;
    private static $keyTest;
    private static $keyProd;
    private static $device;
    private static $validity;
    private static $amount;
    private static $validationMode;
    private static $currency;
    private static $locale;
    private static $sendMail;
    private static $recipients;
    private static $recipient;
    private static $reference;
    private static $message;
    private static $subject;
    private static $expandedData;
    private static $offerId;


    public static function setUpBeforeClass()
    {
        // set here URL and credentials of a testing store with WS option
        self::$apiUrl = 'https://secure.payzen.eu/vads-ws/paymentoffer-v2?wsdl';
        self::$shopId = '65201958';
        self::$ctxMode = 'TEST';
        self::$keyTest = '4229590531437673';
        self::$keyProd = '2222222222222222';
        self::$device = 'MAIL';
        self::$validity = new \DateTime('now');
        self::$amount = '10000';
        self::$validationMode = '0';
        self::$currency = '978';
        self::$locale= 'fr';
        self::$sendMail = true;
        self::$recipients = array('toto@test.com', 'toto@test.fr', 'toto@test.info');
        self::$recipient =  self::$recipients[0];
        self::$reference = '001';
        self::$message = 'Dear customer, thank you for your order';
        self::$subject = 'Payment link';
        self::$expandedData = 'vads_payment_config=MULTI:first=2500;count=4;period=20&vads_language=es';
        self::$offerId = '';

        $context = stream_context_create(
            array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            )
        );

        $options = array(
            'stream_context' => $context
        );

        self::$paymentOfferApi = new \Lyranetwork\PaymentOfferWS(self::$apiUrl, $options);
    }

    public function testCreatePaymentOffer()
    {
        $createPaymentResponse = self::createPayment();
        $offerEntities = $createPaymentResponse->getOfferEntities();
        $this->assertNotNull($offerEntities);

        foreach ($offerEntities as $key => $offerEntity) {
           $this->assertEquals(self::$expandedData, $offerEntity->getExpandedData());
           $this->assertNotNull($offerEntity->getOfferId());
           $this->assertTrue(in_array($offerEntity->getRecipient(), self::$recipients, true));
           $this->assertNotEmpty($offerEntity->getPaymentURL());
           $this->assertEquals(self::$shopId, $offerEntity->getShopId());
           $this->assertEquals(self::$ctxMode, $offerEntity->getCtxMode());
           $this->assertNotEmpty($offerEntity->getReference());
           $this->assertEquals(self::$subject, $offerEntity->getSubject());
           $this->assertEquals(self::$message, $offerEntity->getMessage());
           $this->assertEquals(self::$device,$offerEntity->getDevice());
           $this->assertEquals(self::$validity, $offerEntity->getValidity());
           $this->assertEquals(self::$amount, $offerEntity->getAmount());
           $this->assertEquals(self::$validationMode, $offerEntity->getValidationMode());
           $this->assertEquals(self::$currency, $offerEntity->getCurrency());
           $this->assertEquals(self::$locale, $offerEntity->getLocale());
           $this->assertEquals(self::$sendMail, $offerEntity->getSendMail());
        }

        self::$offerId = $offerEntity->getOfferId();
        self::$reference = $offerEntity->getReference();

        $this->assertEquals('OK', $createPaymentResponse->getReponseCode());
        $this->assertNotEmpty($createPaymentResponse->getReturnMessage());
    }

    private static function createPayment()
    {
        $createPayment = new \Lyranetwork\Model\PaymentOfferInfo();
        $createPayment->setShopId(self::$shopId);
        $createPayment->setCtxMode(self::$ctxMode);
        $createPayment->setCertificate(self::$keyTest, self::$keyProd);
        $createPayment->setReference(self::$reference);
        $createPayment->setRecipients(self::$recipients);
        $createPayment->setSubject(self::$subject);
        $createPayment->setMessage(self::$message);
        $createPayment->setDevice(self::$device);
        $createPayment->setValidity(self::$validity);
        $createPayment->setAmount(self::$amount);
        $createPayment->setValidationMode(self::$validationMode);
        $createPayment->setCurrency(self::$currency);
        $createPayment->setLocale(self::$locale);
        $createPayment->setSendMail(self::$sendMail);
        $createPayment->setExpandedData(self::$expandedData);

        $createPaymentResponse = self::$paymentOfferApi->createPaymentOffer($createPayment);

        return $createPaymentResponse;
    }

    public function testUpdatePaymentOffer()
    {
        $updatePaymentResponse = self::updatePayment();
        $offerEntities = $updatePaymentResponse->getOfferEntities();
        $this->assertNotNull($offerEntities);

        foreach ($offerEntities as $key => $offerEntity) {
            $this->assertEquals(self::$expandedData, $offerEntity->getExpandedData());
            $this->assertEquals(self::$offerId, $offerEntity->getOfferId());
            $this->assertEquals(self::$recipient,  $offerEntity->getRecipient());
            $this->assertEquals(self::$shopId, $offerEntity->getShopId());
            $this->assertEquals(self::$ctxMode, $offerEntity->getCtxMode());
            $this->assertEquals(self::$reference, $offerEntity->getReference());
            $this->assertNotEmpty($offerEntity->getPaymentURL());
            $this->assertEquals(self::$subject, $offerEntity->getSubject());
            $this->assertEquals(self::$message, $offerEntity->getMessage());
            $this->assertEquals(self::$device,$offerEntity->getDevice());
            $this->assertEquals(self::$validity, $offerEntity->getValidity());
            $this->assertEquals(self::$amount, $offerEntity->getAmount());
            $this->assertEquals(self::$validationMode, $offerEntity->getValidationMode());
            $this->assertEquals(self::$currency, $offerEntity->getCurrency());
            $this->assertEquals(self::$locale, $offerEntity->getLocale());
            $this->assertEquals(self::$sendMail, $offerEntity->getSendMail());
        }

        $this->assertEquals('OK', $updatePaymentResponse->getReponseCode());
        $this->assertNotEmpty($updatePaymentResponse->getReturnMessage());
    }

    private static function updatePayment()
    {
        $updatePayment = new \Lyranetwork\Model\PaymentOfferEntity();
        $updatePayment->setShopId(self::$shopId);
        $updatePayment->setCtxMode(self::$ctxMode);
        $updatePayment->setCertificate(self::$keyTest, self::$keyProd);
        $updatePayment->setOfferId(self::$offerId);
        $updatePayment->setReference(self::$reference);
        $updatePayment->setRecipient(self::$recipient);
        $updatePayment->setSubject(self::$subject);
        $updatePayment->setMessage(self::$message);
        $updatePayment->setDevice(self::$device);
        $updatePayment->setValidity(self::$validity);
        $updatePayment->setAmount(self::$amount);
        $updatePayment->setValidationMode(self::$validationMode);
        $updatePayment->setCurrency(self::$currency);
        $updatePayment->setLocale(self::$locale);
        $updatePayment->setSendMail(self::$sendMail);
        $updatePayment->setExpandedData(self::$expandedData);

        $updatePaymentResponse = self::$paymentOfferApi->updatePaymentOffer($updatePayment);

        return $updatePaymentResponse;
    }
}
