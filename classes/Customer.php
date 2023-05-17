<?php
  class Customer{
      private $secretKey;
      public function __construct(){
            //set your secret key and the customer's ID
            $this->secretKey = 'sk_test_0792d9498a465a462c4d34636b9852729eccae7b';
      }

      public function check_customer_by_email($email){


            $customerEmail = $email;

            //set the API Endpoint and headers
            $url = 'https://api.paystack.co/customer';
            $headers = array(
                'Authorization: Bearer '.$this->secretKey,
                'Content-Type: application/json',
            );

            //set the parameters for the request
            $params = array(
                'email'=>$customerEmail,
            );

            // Initialize the cURL request
            $ch = curl_init($url);

            // Set the request options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($params));

            // Execute the request
            $response = curl_exec($ch);

            // Check for errors
            if (curl_errno($ch)){
                // There was an error executing the request
                echo 'Error: '.curl_error($ch);
            }else{
                // The request was successful
                $responseData = json_decode($response, true);
                //print_r($responseData);
            }

            //close the cURL request
            curl_close($ch);
            //return $responseData;

            $is_customer_exist = false;

            $customers = $responseData['data'];


            foreach($customers as $item){
                if  ($item['email']==$email){
                  $is_customer_exist = true;
                  break;
                }
            }

            return $is_customer_exist;
      }

      public function create_customer($data){
            $data = (object) $data;
            $title = $data->title;
            $firstname = $data->firstname;
            $lastname = $data->lastname;
            $phone = $data->phone;
            $email = $data->email;
            $amount = $data->amount;

            $metadata = array(
              'title'=>$title
            );


            // Build the data array
            $data = array(
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'email'=>$email,
                'phone'=>$phone,
                'meta'=>$metadata
            );

            // Encode the data array as JSON
            $jsonData = json_encode($data);

            // Set the API endpoint and headers
            $url = 'https://api.paystack.co/customer';
            $headers = array(
              'Authorization: Bearer '.$this->secretKey,
              'Content-Type: application/json',
              'Content-Length: '.strlen($jsonData)
            );

            // Initialize the cURL request
            $ch = curl_init($url);

            // Set the request options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // Execute the request
            $response = curl_exec($ch);

            //check the errors
            if (curl_errno($ch)){
                // There was an error executing the request
                echo 'Error: '.curl_error($ch);
            }else{
                // The request was successful
                $responseData = json_decode($response, true);
                print_r($responseData);
            }

            // Close the cURL request
            curl_close($ch);

      }


  }
?>
