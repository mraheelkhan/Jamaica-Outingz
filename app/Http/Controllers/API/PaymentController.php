<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    function msTimeStamp()
    {
        return (string)round(microtime(1) * 1000);
    }
    // How to sign a FAC Authorize message
    function Sign($passwd, $facId, $acquirerId, $orderNumber, $amount, $currency)
    {
        $stringtohash =
        $passwd.$facId.$acquirerId.$orderNumber.$amount.$currency;
        $hash = sha1($stringtohash, true);
        $signature = base64_encode($hash);

        // $signature = urlencode(base64_encode(pack("H*",
        // sha1($passwd .
        // $facId . '464748' . $orderNumber . $amount .
        // $passwd.$facId.$acquirerId.$orderNumber.$amount.$currency))));
        return $signature;
    }
    // $wsdlurl = 
    // 'https://ecm.firstatlanticcommerce.com/PGService/Services.svc?wsdl';


    //     $options = array(
    //         'location' =>
    //     'https://ecm.firstatlanticcommerce.com/PGService/Services.svc',
    //         'soap_version'=>SOAP_1_1,
    //         'exceptions'=>0,
    //         'trace'=>1,
    //         'cache_wsdl'=>WSDL_CACHE_NONE
    //         );


    //     $client = new SoapClient($wsdlurl , $options);

    //     $password = 'yjRJ9KfTyN7uJL';

    //     // echo "<pre>";
    //     // var_dump($client);
    //     // exit;
    //     $facId = '88803522';
    //     $acquirerId = '464748';
    //     $orderNumber = 'FACPGTEST' . msTimeStamp();
        
    //     $amount = '000000001200';
    //     // 840 = USD, put your currency code here
    //     $currency = '840';
    //     $signature = Sign($password, $facId, $acquirerId, $orderNumber, $amount,
    //     $currency);
    //     // var_dump($signature);
    //     // exit;
    //     $CardDetails = array(
    //             'CardCVV2' => '321',
    //             'CardExpiryDate' => '0922',
    //             'CardNumber' => '4666666666662222',
    //         );
    //         // Transaction Details.
    //         $TransactionDetails = array(
    //             'AcquirerId' => $acquirerId,
    //             'Amount' => $amount,
    //             'Currency' => $currency,
    //             'CurrencyExponent' => 2,
    //             'IPAddress' => '',
    //             'MerchantId' => $facId,
    //             'OrderNumber' =>
    //             $orderNumber,
    //             'Signature' => $signature,
    //             'SignatureMethod' => 'SHA1',
    //             'TransactionCode' => '0'
    //         );

    //         // echo "<pre>";
    //         $AuthorizeRequest = array('Request' => array('CardDetails' => $CardDetails,

    //         'TransactionDetails' => $TransactionDetails));
    //         // For debug, to check the values are OK
    //         // var_dump($AuthorizeRequest);
    //         // exit;   
    //         // Call the Authorize through the Client
    //         $result = $client->Authorize($AuthorizeRequest);
    //         echo "<pre>";
    //         // var_dump($result);
    //         var_dump($client);
    //         exit;
    //         if ($client->fault) {
    //             echo '<h2>Fault</h2><pre>';
    //             print_r($result);
    //                 echo '</pre>';
    //         } else {
    //                 // Check for errors
    //             $err = $client->error;
    //             if ($err) {
    //                 // Display the error
    //                 echo '<h2>Error</h2><pre>' . $err . '</pre>';
    //             } else {
    //             // Display the result
    //             echo '<h2>Result</h2><pre>';
    //             print_r($result);
    //             echo '</pre>';
    //             }
    //         }
}
