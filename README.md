# Lyra payment offer WS API

Lyra payment offer WS API is an open source PHP API that allows making SOAP WS calls to secured payment offer remote service developped by [Lyra Network](https://www.lyra-network.com/) inside e-commerce websites.

## Requirements

PHP 5.3.0 and later.

## Installation

### Composer 

You can install the API via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require lyranetwork/payment-offer-ws-api
```

To use the API, use Composer's [autoload](https://getcomposer.org/doc/00-intro.md#autoloading):

```php
require_once('vendor/autoload.php');
```

### Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/payzen/payment-offer-ws-api/releases). Then, to use the API, include the `init.php` file.

```php
require_once('/path/to/payment-offer-ws-api/init.php');
```

## Usage

Coming soon.

```php
try {
    $shopId = '1234568';
    $ctxMode = 'TEST';
    $keyTest = '1111111111111111';
    $keyProd = '2222222222222222';
    $device = 'MAIL';
    $validity = new DateTime('now');
    $amount = '10000'; 
    $validationMode = '0';
    $currency = '978';
    $locale= 'fr';
    $sendMail = true;
    $reference = '001';
    $message = 'Dear customer, thank you for your order #'. $reference;
    $subject = 'Thank you for your order';

    // proxy options if any
    $options = array(
        'proxy_host' => 'host',
        'proxy_port' => '3128',
        'proxy_login' => 'login',
        'proxy_password' => 'password'
    );
    $offerWsApi = new \Lyranetwork\PaymentofferWs($url,$options);

    // example of createPaymentOffer call
    $createPaymentRequest = new \Lyranetwork\Model\PaymentOfferInfo();
    $createPaymentRequest->setShopId($shopId);
    $createPaymentRequest->setCtxMode($ctxMode);
    $createPaymentRequest->setCertificate($keyTest, $keyProd);
    $createPaymentRequest->setDevice($device);
    $createPaymentRequest->setValidity($validity);
    $createPaymentRequest->setAmount($amount);
    $createPaymentRequest->setValidationMode($validationMode);
    $createPaymentRequest->setCurrency($currency);
    $createPaymentRequest->setLocale($locale);
    $createPaymentRequest->setSendMail($sendMail);
    $createPaymentRequest->setRecipients($recipients);
    $createPaymentRequest->setReference($reference);
    $createPaymentRequest->setMessage($message);
    $createPaymentRequest->setSubject($subject);

    $paymentOfferResponse = $offerWsApi->createPaymentOffer($createPaymentRequest);
    $offerWsApi->checkResult(
            $paymentOfferResponse, 
            array('OK', 'NOT_ALLOWED', 'NOT_AUTHORIZED', 'OFFER_NOT_FOUND','BAD_SIGNATURE',
                  'RECIPIENTS', 'RECIPIENT', 'SUBJECT','MESSAGE', 'CTX_MODE',
                  'DEVICE', 'VALIDITY_DATE', 'AMOUNT', 'VALIDATION_MODE', 'SYSTEM_FAILURE', 
                  'TEMPLATE_NOT_FOUND'
                )
     );

} catch(\SoapFault $f) {
    echo 'Soap Exception <pre>'.print_r($f, true).'</pre>';

        // friendly message here 
} catch(\UnexpectedValueException $e) {
    echo 'Unexpected Value Exception <pre>'.print_r($e, true).'</pre>';

    if ($e->getCode() === -1) {
    // manage authentication error here
    } elseif ($e->getCode() === 1) {
    // merchant does not subscribe to WS option
    } else {
    // manage other unexpected response here
    }
} catch (Exception $e) {
     echo 'Exception <pre>'.print_r($e, true).'</pre>';

    // friendly message here 
}
```

## License

Each Lyra payment offer WS API source file included in this distribution is licensed under GNU GENERAL PUBLIC LICENSE (GPL 3.0).

Please see LICENSE for the full text of the GPL 3.0 license. It is also available through the world-wide-web at this URL: http://www.gnu.org/licenses/.
