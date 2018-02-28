<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('paypal');
        }   
        
        public function index()
        {
          //do something
        }


        public function checkout()
        {
            $paypalUrl = $this->paypal->checkout();
            header('location:'.$paypalUrl);
        }    
        
        public function process()
        {
            //exit;
           $transactionData = $this->paypal->execute();
                     
           //echo $transactionData;exit;
           
           echo "paymentId = ". $paymentId = $transactionData->id;
           echo "<br />";
           echo "paymentState = ".$paymentState = $transactionData->state;
           
           $payerDetail = $transactionData->payer;
          
           echo "<br />";
           echo "paymentMethod = ". $paymentMethod = $payerDetail->payment_method;
           echo "<br />";
           echo "paymentStatus = ". $paymentStatus = $payerDetail->status;
          
     
           $payerInfo = $payerDetail->payer_info;
          
           echo "<br />";
           echo "payerEmail = ". $payerEmail = $payerInfo->email;
           echo "<br />";
           echo "payerFirstname = ". $payerFirstname = $payerInfo->first_name;
           echo "<br />";
           echo "payerLastname = ". $payerLastname = $payerInfo->last_name;
           echo "<br />";
           echo "payerId = ". $payerId = $payerInfo->payer_id;
           
           //$shippingInfo = $payerInfo->shipping_address;
           
           $transactionInfo = $transactionData->transactions[0];
           
           $amountInfo = $transactionInfo->amount;
           echo "<br />";
           echo "total amount = ". $amountInfo->total;
           echo "<br />";
           echo "Currency = ". $amountInfo->currency;
          
           //$amountDetails = $amountInfo->details;
           
           $relatedResources = $transactionInfo->related_resources[0];
           
           $saleInfo = $relatedResources->sale;
           
           echo "<br />";
           echo "saleId = ". $saleInfo->id;
           
           echo "<br />";
           echo "saleState = ". $saleInfo->state;
           
           $this->success();
        }   
        
        public function cancel()
        {
            $this->load->view('public/payment_cancel');
        }
        
        public function success()
        {
                
            if($this->input->get('tx')) {
              
                $tx = $this->input->get('tx');
                
                $response = $this->get_transaction_info($tx);
                 
                echo '<pre>';
                print_r($response);
                 exit;
     
            }
            
           // $this->load->view('public/payment_success');
        }
        
        public function get_access_token()
        {
            //curl initialize
            $ch = curl_init();
            $clientId = "AQYpc_dtMcQIPnNUHKcIWEpp-7ZuoLajjA88ZYAZf-e0TZvHtzwCLI66djwB4PC5hUgKQyWAH4R-QDlW";
            $secret   = "EPjvijcVUeys2gnJQx9P4cY-SS18P9CLd2r5513xioMy0I16dMc4KjWZSrzP7db14ZOJRxZm9Lqw0S0k";

            //set curl options
            curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

            $result = curl_exec($ch);

            if(empty($result)){
                die("Error: No response.");
            }
            else
            {
               // echo $result->app_id;exit;
                $json = json_decode($result);
                return $json->access_token;
            }

            //curl close
            curl_close($ch);

        }
  
        public function get_transaction_info($tx)
        {
            $pdt_identity_tokan = 'KMB7hA9bXdLsKr0jSRevhx1kYLxuOh9FIkcZfX_h8JJapQ6wBzdkMOEfJAu';
            $tx = $tx;
            
             //curl initialize
            $ch = curl_init();

            //set curl options
            curl_setopt($ch, CURLOPT_URL, "https://www.sandbox.paypal.com/cgi-bin/webscr");
            curl_setopt($ch, CURLOPT_HEADER,FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            //curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array
                     (
                      'cmd' => '_notify-synch',
                      'tx' => $tx,
                      'at' => $pdt_identity_tokan,
                    )));

            $result = curl_exec($ch);
            //$status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if(empty($result)){
                die("Error: No response.");
            }
            else
            {
               
               $result = $this->parse_data($result);
                return $result;
     
            }

            //curl close
            curl_close($ch);

        }
        
        public function parse_data($result)
        {
             // parse the data
                $lines = explode("\n", $result);
                $result = array();
                $linedata = array();
                if (strcmp ($lines[0], "SUCCESS") == 0) {
                    for ($i=1; $i<count($lines)-1;$i++){
                        $linedata = explode("=", $lines[$i]);
                        $result[urldecode($linedata[0])] = urldecode($linedata[1]);
                    }
                }
                
                return $result;
        }
}
