<?php
    $amount = 2000*100;

    //sanitize input from users
    $sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    // collect user's input from the form
    $title = $sanitizer['title'];
    $firstname = $sanitizer['firstname'];
    $lastname = $sanitizer['lastname'];
    $email = $sanitizer['email'];
    $phone = $sanitizer['phone'];

    // make sure all fields are filled accordingly
    if (empty($title) or empty($firstname) or empty($lastname) or empty($email) or empty($phone)){
        //header("location: acittex_2023_start_registration.php?eror=1");
    }else{
        session_start();
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['amount'] = $amount;

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
          'email' => $email,
          'amount' => $amount,
          'currency'=>'USD'
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer sk_test_0792d9498a465a462c4d34636b9852729eccae7b",
          "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        echo $result;

    }




?>
<script src="https://js.paystack.co/v1/inline.js"></script>
<body>
<script>

      function test(){
        alert("am here");
      }

      function payWithPaystack(){
          const api = "pk_test_8bb4b4477d49ea20da4ba6e40205ce83d09a6732";
          var handler = PaystackPop.setup({
              key: api,
              email: '<?php echo $email; ?>',
              amount: '<?php echo $amount; ?>',
              currency :"NGN",
              ref: ''+Math.floor((Math.random() * 1000000000) + 1),
              firstname: '<?php echo $firstname; ?>',
              lastname: '<?php echo $lastname; ?>',

              callback: function(response){
                  const referenced = response.reference;
                  window.location.href = 'success.php?status='+referenced;
              },
              onClose: function(){
                  alert('window closed');
              }

          });

      }

</script>
<form>

    <button type="button" onclick="payWithPaystack()">Pay</button>
</form>
</body>
