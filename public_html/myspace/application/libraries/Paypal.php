<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Api\PaymentExecution;


class Paypal
{    
    protected $CI;
    protected $apiContext;
    public function __construct() {
       
        $this->CI =& get_instance();
        
        require_once './paypal/vendor/autoload.php';
        
        $this->apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                 '',    
                 ''  
                )
         );
     }
     
     
     public function checkout(){
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('payment/process'))
          ->setCancelUrl(base_url('payment/cancel'));
        
        
        $item1 = new Item();
        $item1->setName('Pro User Fee')
            ->setCurrency('USD')
            ->setQuantity(1)
            //->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(0.1);

        $item2 = new Item();
        $item2->setName('Donation Fee')
            ->setCurrency('USD')
            ->setQuantity(1)
            //->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(0.1);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));
        
        $details = new Details();
        $details->setShipping(0.1)
        ->setTax(0.5)
        ->setSubtotal(0.2);

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("USD")
          ->setTotal(0.8)
          ->setDetails($details);
        
        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
          ->setDescription("My Payment description");

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
          ->setPayer($payer)
          ->setRedirectUrls($redirectUrls)
          ->setTransactions(array($transaction));
             
         // Create payment with valid API context
        try {
          $payment->create($this->apiContext);

          // Get PayPal redirect URL and redirect user
          return $approvalUrl = $payment->getApprovalLink();
          
           // REDIRECT USER TO $approvalUrl
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }
     }
     
     public function execute() {
        // Get payment object by passing paymentId 
        $paymentId = $this->CI->input->get('paymentId');
        $payment = Payment::get($paymentId, $this->apiContext);
        $payerId = $this->CI->input->get('PayerID');

        // Execute payment with payer id
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
          // Execute payment
          $result = $payment->execute($execution, $this->apiContext);
          return $result;
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }
     }
             
}
