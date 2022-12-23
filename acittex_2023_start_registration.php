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



				<form action="payment_accitext.php" method="post">

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
																	<button type="submit" onclick="payWithPaystack()" style='padding:7px; font-weight:bold;cursor:pointer;'> Payment </button>
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
