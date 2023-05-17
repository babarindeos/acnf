<?php
  class Payment{

      private $secretKey;
      public function __construct(){
            //set your secret key and the customer's ID
            $this->secretKey = 'sk_test_0792d9498a465a462c4d34636b9852729eccae7b';
      }

      public function payment_authorization($email, $amount, $callback_url){
          $url = "https://api.paystack.co/transaction/initialize";

          $fields = [
            'email'=>$email,
            'amount'=>$amount,
            'callback_url'=>$callback_url
          ];

          $fields_string = http_build_query($fields);

          // open connection
          $ch = curl_init();

          //set the url, number of POST vars, POST data
						curl_setopt($ch,CURLOPT_URL, $url);
						curl_setopt($ch,CURLOPT_POST, true);
						curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							"Authorization: Bearer ".$this->secretKey,
							"Cache-Control: no-cache",
						));

						//So that curl_exec returns the contents of the cURL; rather than echoing it
						curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

						//execute post
						$result = curl_exec($ch);


						$result = json_decode($result);

            return $result;

      }
  }



?>
