<?php
			require_once("classes/Customer.php");
			require_once("classes/Payment.php");

			$err_flag = 0;
			$err_msg = '';
			if (isset($_POST['btnSubmit'])){
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
									$err_flag = 1;
									$err_msg = "All fields are required to be filled to proceed...";

							}else{
									session_start();
									$_SESSION['title'] = $title;
									$_SESSION['firstname'] = $firstname;
									$_SESSION['lastname'] = $lastname;
									$_SESSION['phone'] = $phone;
									$_SESSION['email'] = $email;
									$_SESSION['amount'] = $amount;

									$customer = new Customer();
									$check_customer = $customer->check_customer_by_email($email);

									if (!$check_customer){
												$data = array("title"=>$title, "firstname"=>$firstname, "lastname"=>$lastname, "phone"=>$phone, "email"=>$email,
																			"amount"=>$amount);
												$create_customer = $customer->create_customer($data);
									}

									$callback_url = 'http://localhost/acnf/accitext_payment_status.php';
									$payment = new Payment();
									$authorization = $payment->payment_authorization($email, $amount, $callback_url);

									//var_dump($authorization_url);

									if ($authorization->status){
												$authorization_url = $authorization->data->authorization_url;
												$access_code = $authorization->data->access_code;
												$reference = $authorization->data->reference;

												$_SESSION['access_code'] = $access_code;
												$_SESSION['reference'] = $reference;

												header("location: {$authorization_url}");
									}

							} // end of else

			} // end if isset





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="mainstylesheet.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Information about ACNF - History,Foundation,Vision,Mission,Core Values, Organizational Structure,Management, Advisory Council/Patrons, Regional/Country Chapter Executives" />
<meta name="keywords" content="About ACNF,ACNF,Africa,Caribbean" />

<title>African Caribbean Network Foundation(ACNF) - ACITTEX</title>

<style type="text/css">
body {
	margin-top: 0px;
}
</style>
</head>

<body onload="slide();" bgcolor="#999999">
<table width="948" border="0" align="center" bgcolor="#FFFFFF" cellpadding="1px">
  <tr>
    <td>
    <?php
	 include("header.php");

	?>

    </td>
  </tr>
  <tr><td>


  </td></tr>
  <tr><td>

    <div style='margin: 15px;'>
        <h2 style='color:#069; margin-top:30px'>Register for ACITTEX 2023	</h2>
				<div style='margin-top:-15px;'>Please provide the correct information reserve a slot for this event</div>



				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div style='margin-top:50px;margin-bottom:100px;'>
					<form id="paymentForm"> <!-- form //-->
								<table width='75%' cellspacing='5px' cellpadding='5px'>

									<!-- Title //-->
									<tr>
											<td>
													<div class="form-group">
																<label for="title">Title</label>
													</div>
											</td>
											<td>
												<div class="form-group">
																<input type="text" id="title" name='title' size='20%' required style='padding:7px;' />
												</div>
											</td>
									</tr>
									<!-- end of title //-->

									<!-- firstname //-->
									<tr>
											<td>
													<div class="form-group">
																<label for="firstname">Firstname</label>
													</div>
											</td>
											<td>
												<div class="form-group">
																<input type="text" id="firstname" name="firstname" size='60%' required style='padding:7px;' />
												</div>
											</td>
									</tr>
									<!-- end of firstname //-->


										<!-- lastname //-->
										<tr>
												<td>
														<div class="form-group">
																	<label for="lastname">Lastname</label>
														</div>
												</td>
												<td>
													<div class="form-group">
																	<input type="text" id="lastname" name="lastname" size='60%' required style='padding:7px;' />
													</div>
												</td>
										</tr>
										<!-- end of lastname //-->


										<!-- email address //-->
										<tr>
												<td>
														<div class="form-group">
																	<label for="email">Email address</label>
														</div>
												</td>
												<td>
													<div class="form-group">
																	<input type="email" id="email" name="email" size='60%' required style='padding:7px;' />
																	<div>
																				<small>Please supply an active and functional email address</small>
																	</div>
													</div>
												</td>
										</tr>
										<!-- end of email //-->

										<!-- phone //-->
										<tr>
												<td>
														<div class="form-group">
																	<label for="phone">Phone</label>
														</div>
												</td>
												<td>
													<div class="form-group">
																	<input size='40%' type="phone" id="phone" name="phone" required style='padding:7px;' />
																	<div>
																			<small>Please provide a phone number on which you can be reached</small>
																	</div>
													</div>
												</td>
										</tr>
										<!-- end of phone //-->

										<!-- phone //-->
										<tr>
												<td>

												</td>
												<td>
													<div class="form-group">
																	<button type="submit" name="btnSubmit" style='padding:7px; font-weight:bold;cursor:pointer;'> Payment </button>
													</div>
												</td>
										</tr>
										<!-- end of phone //-->
								</table>



        </div>
			</form>

    </div>

  </td></tr>
  <tr><td>
  <?php

  include("footer.php");
  ?>
  </td></tr>
</table>
</body>
</html>
