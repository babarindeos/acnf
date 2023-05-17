<?php
      session_start();
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

									var_dump($authorization_url);

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
        <?php
            echo "<div style='margin-top:15px;'>";
                echo "<h3>Congratulations {$_SESSION['title']} {$_SESSION['lastname']} {$_SESSION['firstname']}, you have successfully reserved a slot for your participation for ACITTEX 2023.</h3>";
            echo "</div>";
        ?>



        <?php
            $fullname = $_SESSION['title'].' '.$_SESSION['lastname'].' '.$_SESSION['firstname'];
            $email = $_SESSION['email'];
            $phone = $_SESSION['phone'];

        ?>



				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <br/><div>Please provide the correct information in the fields below to complete your registration. Thank you.</div>

        <div style='margin-top:30px;margin-bottom:100px;'>
					<form id="paymentForm"> <!-- form //-->
								<table width='100%' cellspacing='5px' cellpadding='5px'>

									<!-- Title //-->
									<tr>
											<td width='15%'>
													<div class="form-group">
																<label for="title">Full name</label>
													</div>
											</td>
											<td>
												<div class="form-group">
																<input type="text" id="title" name='title' required style='padding:7px;background-color:#f1f1f1;'  size='60%'  value="<?php echo $fullname; ?>" readonly />
												</div>
											</td>
									</tr>
									<!-- end of title //-->


										<!-- email address //-->
										<tr>
												<td>
														<div class="form-group">
																	<label for="email">Email address</label>
														</div>
												</td>
												<td>
													<div class="form-group">
																	<input type="email" id="email" name="email" size='60%' required style='padding:7px;background-color:#f1f1f1;' value="<?php echo $email ;?>" readonly />

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
																	<input size='40%' type="phone" id="phone" name="phone" required style='padding:7px;background-color:#f1f1f1;' readonly value="<?php echo $phone;?>" />

													</div>
												</td>
										</tr>
										<!-- end of phone //-->

                    <!-- occupation //-->
                    <tr>
                        <td>
                            <div class="form-group">
                                  <label for="occupation">Occupation</label>
                            </div>
                        </td>
                        <td>
                          <div class="form-group">
                                  <input type="text" id="occupation" name="occupation" size='80%' required style='padding:7px;' />
                          </div>
                        </td>
                    </tr>
                    <!-- end of occupation //-->


                      <!-- Company //-->
                      <tr>
                          <td>
                              <div class="form-group">
                                    <label for="lastname">Company</label>
                              </div>
                          </td>
                          <td>
                            <div class="form-group">
                                    <input type="text" id="company" name="company" size='100%' required style='padding:7px;' />
                            </div>
                          </td>
                      </tr>
                      <!-- end of Company //-->


                      <!-- Address //-->
                      <tr>
                          <td>
                              <div class="form-group">
                                    <label for="address">Address</label>
                              </div>
                          </td>
                          <td>
                            <div class="form-group">
                                    <input type="text" id="company" name="address" size='100%' required style='padding:7px;' />
                            </div>
                          </td>
                      </tr>
                      <!-- end of Address //-->


                      <!-- Address //-->
                      <tr>
                          <td>
                              <div class="form-group">
                                    <label for="address">State</label>
                              </div>
                          </td>
                          <td>
                            <div class="form-group">
                                    <input type="text" id="state" name="state" size='100%' required style='padding:7px;' />
                            </div>
                          </td>
                      </tr>
                      <!-- end of Address //-->


                      <!-- Address //-->
                      <tr>
                          <td>
                              <div class="form-group">
                                    <label for="country">Country</label>
                              </div>
                          </td>
                          <td>
                            <div class="form-group">
                                    <input type="text" id="country" name="country" size='100%' required style='padding:7px;' />
                            </div>
                          </td>
                      </tr>
                      <!-- end of Address //-->



										<!-- phone //-->
										<tr>
												<td>

												</td>
												<td>
													<div class="form-group">
																	<button type="submit" name="btnSubmit" style='padding:7px; font-weight:bold;cursor:pointer;background-color:green; color:white; border:1px solid green; border-radius:5px;'> Submit Registration Form </button>
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
